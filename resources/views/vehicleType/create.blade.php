@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
        <div class="card-title">Add vehicle type </div>
            @include('vehicleType.form')
        </div>
    </div>
</main>
@endsection