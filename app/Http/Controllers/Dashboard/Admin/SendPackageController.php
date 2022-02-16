<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendPackageRequest;
use App\Models\Item;
use App\Models\Package;
use App\Models\Proof;
use App\Models\TemporaryFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class SendPackageController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('dashboard.senditem', compact('users'));
    }

    public function store(SendPackageRequest $request)
    {
        $this->authorize('send_package');
        $proof_of_sender = $request->input('proof', []);
        $itemNames = $request->input('itemNames', []);
        $quantities = $request->input('quantities', []);

        DB::transaction(function () use ($proof_of_sender, $itemNames, $quantities, $request) {
            $package = Package::create([
                'user_id' => auth()->user()->id,
                'receiver_id' => $request->user_id,
                'sender' => $request->sender,
                'courier' => $request->courier,
                'destination' => $request->destination,
                'delivery_date' => Carbon::parse($request->deliveryDate)->format('Y-m-d H:i'),
                'position' => $request->position,
                'status' => 0,
            ]);
            for ($item = 0; $item < count($itemNames); $item++) {
                $createItem = Item::create(['itemName' => $itemNames[$item], 'quantity' => $quantities[$item]]);
                $package->items()->attach($createItem->id);
            }
            foreach ($proof_of_sender as $proof) {
                $temporaryFile = TemporaryFile::where('folder', $proof)->first();
                if ($temporaryFile) {
                    Storage::move(
                        'public/images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->filename,
                        'public/images/' . $temporaryFile->folder . '/' . $temporaryFile->filename
                    );
                    $proof = Proof::create([
                        'filename' => $temporaryFile->filename,
                        'folder' => $temporaryFile->folder,
                        'file_url' => getenv('APP_STORAGE_URL') . '/images' . '/' . $temporaryFile->folder . '/' . $temporaryFile->filename,
                        'type' => 0
                    ]);
                    $package->proofOfSender()->attach($proof->id);
                    $temporaryFile->delete();
                }
            }
            // $client = new Client('ACaabc096c39411c4d9348f26db7553bb3', 'ff92a7800d56579c5f9cb2d242cfb7a4');
            // $client->messages->create(
            //     '+63' . substr($request->sender, 1),
            //     [
            //         'from' => '+12058519636',
            //         'body' => 'Ordered Placed to ' . $request->destination,
            //     ]
            // );
        });
        return redirect()->route('admin.dashboard');
    }
}
