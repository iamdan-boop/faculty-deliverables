<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdatePasswordRequestSettings;
use App\Http\Requests\Settings\UpdatePersonalInformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('dashboard.settings', compact('user'));
    }

    public function updateInfo(UpdatePersonalInformationRequest $request)
    {
        User::find(auth()->user()->id)->fill($request->validated())->save();
        return redirect()->back();
    }


    public function updatePassword(UpdatePasswordRequestSettings $request) {
        $user = User::find(auth()->user()->id);
        abort_if(!Hash::check($request->currentPassword, $user->password), 401, 'Invalid Password');
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back();
    }
}
