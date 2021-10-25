@extends('layouts.app')

@section('content')
    <div>
        <section class="flex flex-col md:flex-row h-screen items-center">
            <div class="hidden lg:block w-full md:1/2 xl:w-2/3 h-screen">
                <img src="{{ asset('assets/cpsu.png') }}" alt="Cpsu Location" class="w-full h-full object-cover">
            </div>
            <div
                class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
      flex items-center justify-center">
                <div class="w-full h-100 font-poppins">
                    <h1 class="text-xl font-bold">Faculty Deliverables Login</h1>
                    <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="label-style">
                            <label class="text-sm text-gray-500">Email</label>
                            <input type="email" name="email" class="input-style" placeholder="example@email.com"
                                value="{{ old('email') }}" required />
                        </div>

                        <div class="label-style">
                            <label class="text-sm text-gray-500">Password</label>
                            <input type="password" name="password" class="input-style" placeholder="Your secret key"
                                required />
                        </div>
                        <div class="text-right mt-2">
                            <a href="{{ route('password.request') }}"
                                class="text-sm cursor-pointer font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot
                                Password?</a>
                        </div>

                        <button
                            class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                            Log In
                        </button>

                    </form>
                    <hr class="my-6 border-gray-300 w-full">

                    @if (session('status'))
                        <div class="bg-red-400 p-3 mt-2 rounded-md font-poppins text-gray-50 w-full text-center">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (session('forgotStatus'))
                        <div class="bg-green-500 p-3 mt-2 rounded-md font-poppins text-gray-50 w-full text-center">
                            {{ session('forgotStatus') }}
                        </div>
                    @endif

                    <p class="mt-8">
                        Need an account?
                        <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                            Create an account
                        </a>
                    </p>

                    <p class="text-sm text-gray-500 mt-12">&copy; 2021 Faculty Deliverables - All Rights Reserved.</p>

                    </form>
                </div>

        </section>
    </div>
@endsection
