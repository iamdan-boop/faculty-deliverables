<?php

use App\Models\Item;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (Request $request) {
    $package = Package::create(['user_id' => 1, 'receiver_id' => 3, 'status' => 0]);
    $items = [
        ['itemName' => 'item one', 'quantity' => 10],
        ['itemName' => 'item two', 'quantity' => 20]
    ];
    foreach ($items as $item) {
        $createItem = Item::create(['itemName' => $item['itemName'], 'quantity' => $item['quantity']]);
        $package->items()->attach($createItem->id);
    }
    return $package;
});


Route::get('/packages', function (Request $request) {
    $package = Package::with(['sender', 'receiver', 'items', 'proofOfSender'])->first();
    return $package;
});


Route::get('path', function (Request $request) {
    Storage::move('public/images/tmp/6197d29b23996-1637339803/doge.jpg', 'public/images/6197d29b23996-1637339803/doge.jpg');
});


Route::get('sms', function (Request $request) {
    $client = new Client('ACaabc096c39411c4d9348f26db7553bb3', 'ff92a7800d56579c5f9cb2d242cfb7a4');
    $message = $client->messages->create(
        '+639955430420', // Text this number
        [
            'from' => '+12058519636', // From a valid Twilio number
            'body' => 'He N Tho'
        ]
    );
    return $message->sid;
});


Route::get('/proof', function (Request $request) {
    return public_path();
});
