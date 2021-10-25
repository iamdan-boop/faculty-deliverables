@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 flex items-center justify-center h-screen">
        <div class="bg-white rounded-md shadow-md p-5 w-2/6">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $token }}" name="token">
                <div class="label-style">
                    <label class="text-sm text-gray-500">Email</label>
                    <input type="email" name="email" class="input-style" placeholder="example@email.com"
                    value="{{ $email }}"
                    required readonly/>
                </div>
                <div class="label-style">
                    <label class="text-sm text-gray-500">Password</label>
                    <input type="password" name="password" class="input-style" placeholder="New Password"
                    required />
                </div>
                <div class="label-style">
                    <label class="text-sm text-gray-500">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="input-style" placeholder="Confirm Password"
                        required />
                </div>
                <button type="submit"
                    class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                    Sign up
                </button>
            </form>
        </div>
    </div>        
@endsection
