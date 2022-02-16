@extends('layouts.app')

@section('content')
    <div>
        <div class="flex flex-row p-3 bg-gray-900">
            <nav class=" bg-gray-900 flex justify-between w-full">
                <ul class="text-white font-poppins flex items-center space-x-3">
                    <li><img src="{{ asset('assets/cpsu-logo.png') }}" alt="CPSU LOGO" height="70" width="70"
                            class="mr-3"></li>
                    <li>
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="dashboardSelection">Dashboard</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="dashboardSelection">Dashboard</a>
                        @endif
                    </li>
                    @can('send_package')
                        <li><a href="{{ route('admin.sendpackage') }}" class="dashboardSelection">Send Item</a></li>
                    @endcan


                    @if (auth()->user()->is_admin)
                        <li><a href="{{ route('admin.logs') }}" class="dashboardSelection">Logs</a></li>
                    @else
                        <li><a href="{{ route('user.logs') }}" class="dashboardSelection">Logs</a></li>
                    @endif
                    @can('view_users')
                        <li><a href="{{ route('admin.users') }}" class="dashboardSelection">User Management</a></li>
                    @endcan
                </ul>

                <ul class="flex items-center font-poppins text-white space-x-5">
                    <li><a href="">{{ auth()->user()->name }}</a></li>
                    @if (auth()->user()->is_admin)
                        <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                    @else
                        <li><a href="{{ route('user.settings') }}">Settings</a></li>
                    @endif
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
