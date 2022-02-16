@extends('layouts.dashboard')


@section('dashboard-content')
    <div class="mt-10 w-full flex items-center justify-center">
        <div class="bg-white rounded-md shadow-md w-2/4 py-5 px-7">
            <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                @method('PUT')
                @csrf
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
                        <label class="text-sm text-gray-500">Contact Number</label>
                        <input type="text" name="contactNumber" class="input-style" placeholder="+63"
                            value="{{ $user->contactNumber }}" />

                        @error('contactNumber')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="grid-2-row">
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
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Password</label>
                        <input type="password" name="password" class="input-style" placeholder="Your secret key" />
                        @error('password')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="grid-2-row">
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Campus</label>
                        <input type="text" name="campus" class="input-style" placeholder="Campus Integrated School"
                            value="{{ $user->campus }}" />


                        @error('campus')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Position</label>
                        <input type="text" name="position" class="input-style" placeholder="Faculty Admin"
                            value="{{ $user->position }}" />


                        @error('position')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex items-center ml-2">
                        <input type="checkbox" id="set_admin" name="is_admin" class="" />
                        <label for="set_admin" class="ml-2 block text-sm text-gray-900">Set as <a href="#"
                                class="text-indigo-600 hover:text-indigo-500">Administrator</a>
                        </label>
                    </div>
                </div>
                <div class="flex items-end justify-end">
                    <button type="submit"
                        class="mt-7 w-2/12 font-poppins bg-gray-900 rounded-md p-3 text-white hover:bg-gray-800">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
