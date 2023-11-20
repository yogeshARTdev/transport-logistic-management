@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Create truck</div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @include('vehicle.form')
        </div>
    </div>
</main>
@endsection