@extends('layouts.app')

@section('content')
    <div>
        <div class="flex flex-row p-3 bg-gray-900">
            <nav class=" bg-gray-900 flex justify-between w-full">
                <ul class="text-white font-poppins flex items-center space-x-3">
                    <li><img src="{{ asset('assets/cpsu-logo.png') }}" alt="CPSU LOGO" height="70" width="70"
                            class="mr-3"></li>
                    <li><a href="{{ route('dashboard') }}" class="dashboardSelection">Dashboard</a></li>
                    <li><a href="{{ route('senditem') }}" class="dashboardSelection">Send Item</a></li>
                    <li><a href="{{ route('logs') }}" class="dashboardSelection">Logs</a></li>
                    <li><a href="{{ route('users') }}" class="dashboardSelection">User Management</a></li>
                </ul>

                <ul class="flex items-center font-poppins text-white space-x-5">
                    <li><a href="">{{ auth()->user()->name }}</a></li>
                    <li><a href="{{ route('settings') }}">Settings</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="mr-3">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        @yield('dashboard-content')
    </div>
@endsection
