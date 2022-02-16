<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Proof;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PendingPackageController extends Controller
{
    public function index()
    {
        $package = Package::with(['items', 'packageSender', 'proofOfSender', 'proofOfReceiver'])->where('status', 0)->first();
        return view('dashboard.pending-package', compact('package'));
    }


    public function edit($id)
    {
        $package = Package::with(['packageSender', 'receiver', 'items', 'proofOfSender'])->where('id', $id)->first();
        return view('dashboard.pending-package', compact('package'));
    }


    public function update($id, Request $request)
    {

        $proof_of_sender = $request->input('proof', []);
        DB::transaction(function () use ($id, $proof_of_sender) {
            $package = Package::find($id);
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
                        'type' => 1
                    ]);
                    $package->proofOfReceiver()->attach($proof->id, ['type' => 1]);
                    $package->status = 1;
                    $package->save();
                    $temporaryFile->delete();
                }
            }
        });
        return redirect()->route('admin.dashboard');
    }


    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $package = Package::find($id);
            $package->delete();
        });
        return redirect()->route('admin.dashboard');
    }
}
