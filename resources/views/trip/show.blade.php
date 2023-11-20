@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Trip details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Vehicle</div>
                <div class="col-lg-9 col-md-8">{{ $trip->vehicle->registration_number }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Driver</div>
                <div class="col-lg-9 col-md-8">{{ $trip->driver->name}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Goods</div>
                <div class="col-lg-9 col-md-8">{{$trip->goods->name}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Quantity</div>
                <div class="col-lg-9 col-md-8">{{$trip->quantity}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">From</div>
                <div class="col-lg-9 col-md-8">{{$trip->from}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">To</div>
                <div class="col-lg-9 col-md-8">{{$trip->to}}</div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('receivedgoods.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<style>
.label {
    color: rgb(8 54 137 / 60%);
}
</style>