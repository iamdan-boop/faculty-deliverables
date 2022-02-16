@extends('layouts.dashboard')


@section('dashboard-content')
    <div class="px-5">
        <div class="py-5">
            <div class="grid grid-flow-col grid-cols-2">
                <div class="ml-5">
                    <div class="text-md text-gray-900 font-poppins">Profile Information</div>
                    <div class="text-sm text-gray-600 font-poppins">Update your account's profile information and email
                        address
                    </div>
                </div>
                <div class="bg-gray-50 shadow-sm rounded-md p-5">
                    <div class="text-md font-poppins">Personal Information</div>
                    <form @if (auth()->user()->is_admin)
                        action="{{ route('admin.settings.personal') }}"
                    @else
                        action="{{ route('user.settings.personal') }}"
                        @endif
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid-2-row">
                            <div class="label-style">
                                <label class="text-sm text-gray-500">Name</label>
                                <input type="text" name="name" class="input-style" placeholder="John Doe"
                                    value="{{ $user->name }}" />

                                @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="label-style">
                                <label class="text-sm text-gray-500">Email</label>
                                <input type="text" name="email" class="input-style" placeholder="example@email.com"
                                    value="{{ $user->email }}" />

                                @error('email')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid-2-row">
                            <div class="label-style">
                                <label class="text-sm text-gray-500">Position</label>
                                <input type="text" name="position" class="input-style" placeholder="Teacher"
                                    value="{{ $user->position }}" />

                                @error('position')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="label-style">
                                <label class="text-sm text-gray-500">Phone Number</label>
                                <input type="text" name="contactNumber" class="input-style" placeholder="+63"
                                    value="{{ $user->contactNumber }}" />

                                @error('contactNumber')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="label-style">
                            <label class="text-sm text-gray-500 font-poppins">Campus</label>
                            <input type="text" name="campus" class="input-style" placeholder="Campus"
                                value="{{ $user->campus }}" />

                            @error('campus')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex items-end justify-end">
                            <button type="submit"
                                class="bg-gray-800 text-gray-50 text-sm font-poppins rounded-md shadow-sm px-3 py-2 mt-4">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <hr class="w-full bg-gray-500 mt-2">
        <div class="py-5">
            <div class="grid grid-flow-col grid-cols-2">
                <div class="ml-5">
                    <div class="text-md text-gray-900 font-poppins">Update Password</div>
                    <div class="text-sm text-gray-600 font-poppins">Ensure your account is using a long random password to
                        stay
                        secure.
                    </div>
                </div>
                <div class="bg-gray-50 shadow-sm rounded-md pb-5 pt-3 px-5">
                    <form @if (auth()->user()->is_admin)

                        action="{{ route('admin.settings.password') }}"
                    @else
                        action="{{ route('user.settings.password') }}"
                        @endif

                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="w-2/3">
                            <div class="label-style">
                                <label class="text-sm text-gray-500 font-poppins">Current Password</label>
                                <input type="password" name="currentPassword" class="input-style"
                                    placeholder="Current Password" value="{{ old('currentPassword') }}" />

                                @error('currentPassword')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="w-2/3">
                            <div class="label-style">
                                <label class="text-sm text-gray-500 font-poppins">New Password</label>
                                <input type="password" name="password" class="input-style" placeholder="New Password"
                                    value="{{ old('password') }}" />

                                @error('password')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="w-2/3">
                            <div class="label-style">
                                <label class="text-sm text-gray-500 font-poppins">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="input-style"
                                    placeholder="Confirm Password" value="{{ old('password_confirmation') }}" />

                                @error('password_confirmation')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-end justify-end">
                            <button type="submit"
                                class="bg-gray-800 text-gray-50 text-sm font-poppins rounded-md shadow-sm px-3 py-2 mt-4">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
