@extends('layouts.dashboard')

@section('dashboard-content')
<div class="flex items-center">
    <div class="cardContainer card1">
        <div class="text-lg">Received Items</div>
        <div>15</div>
    </div>

    <div class="cardContainer card2">
        <div class="text-lg">Pending Items</div>
        <div>15</div>
    </div>

    <div class="cardContainer card3">
        <div class="text-lg">Number of User</div>
        <div>{{ $users }}</div>
    </div>
</div>
@endsection