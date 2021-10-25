@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 flex items-center justify-center h-screen">
        <div class="bg-white rounded-md shadow-md p-5 w-2/6">
            @if (session('status'))
            <div class="bg-green-500 p-3 mb-2 rounded-md font-poppins text-gray-50 w-full text-center">
                {{ session('status') }}
            </div>
            @endif
            <div class="font-poppins text-gray-900 text-md">Reset Password</div>
            <div class="text-gray-500 text-sm">Reset password link will be receive by the email you provided,
                we highly advice use an active email during registration.
            </div>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="label-style">
                    <label class="text-sm text-gray-500">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none @error('email')
                    border-red-400                   
                    @enderror"
                        placeholder="example@email.com" required />
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                    Send Instructions
                </button>
            </form>
        </div>
    </div>
@endsection
