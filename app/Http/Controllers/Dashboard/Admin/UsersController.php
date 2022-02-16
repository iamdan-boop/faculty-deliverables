<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.edit_users', compact('user'));
    }

    public function update($id, EditUserRequest $request)
    {

        $user = User::find($id);
        if ($request->has('is_admin')) {
            $user->update([
                'email' => $request->email,
                'name' => $request->name,
                'contactNumber' => $request->contactNumber,
                'position' => $request->position,
                'campus' => $request->campus,
                'is_admin' => $request->is_admin
            ]);
        }
        $user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'contactNumber' => $request->contactNumber,
            'position' => $request->position,
            'campus' => $request->campus,
        ]);
        return redirect()->route('admin.users');
    }
}
