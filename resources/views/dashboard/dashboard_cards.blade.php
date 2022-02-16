@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="flex items-center">
        <div class="cardContainer card1">
            <div class="text-lg">Received Items</div>
            <div>{{ $receivedPackages }}</div>
        </div>

        <div class="cardContainer card2">
            <div class="text-lg">Pending Items</div>
            <div>{{ $pendingPackages }}</div>
        </div>

        @can('view_users')
            <div class="cardContainer card3">
                <div class="text-lg">Number of User</div>
                <div>{{ $users }}</div>
            </div>
        @endcan
    </div>
@endsection
