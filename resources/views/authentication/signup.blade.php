@extends('layouts.app')

@section('content')
    <div class="min-h-screen w-full flex items-center justify-center bg-signup-bg-1 bg-no-repeat bg-cover">
        <div class="bg-gray-50 rounded-md shadow-md w-2/4 py-5 px-7 bg-opacity-50">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="font-poppins text-center text-gray-900">Faculty Deliverables</div>
                <div class="grid-2-row">
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Name</label>
                        <input type="text" name="name" class="input-style" placeholder="John Doe" value="{{ old('name') }}"/>

                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Contact Number</label>
                        <input type="text" name="contactNumber" class="input-style" placeholder="+63" value="{{ old('contactNumber') }}"/>

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
                        <input type="text" name="email" class="input-style" placeholder="example@email.com" value="{{ old('email') }}"/>

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
                        <input type="text" name="campus" class="input-style" placeholder="Campus Integrated School" value="{{ old('campus') }}"/>


                        @error('campus')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="label-style">
                        <label class="text-sm text-gray-500">Position</label>
                        <input type="text" name="position" class="input-style" placeholder="Faculty Admin" value="{{ old('position') }}"/>


                        @error('position')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="mt-7 w-full font-poppins bg-blue-500 rounded-md p-3 text-white hover:bg-blue-400">Signup</button>
                <hr class="my-6 border-gray-400 w-full">

                <div class="font-poppins mt-2">
                    <p class="text-sm">Already have an account? <a href="{{ route('login') }}"
                            class="text-blue-700 text-md hover:text-blue-500">Sign in</a>
                    </p>
                </div>
                <p class="text-sm text-gray-500 mt-12 text-center">&copy; 2021 Faculty Deliverables - All Rights Reserved.
                </p>
            </form>
        </div>
    </div>
@endsection
