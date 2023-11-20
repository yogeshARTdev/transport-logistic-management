@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Warehouse details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Name</div>
                <div class="col-lg-9 col-md-8">{{ $warehouse->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $warehouse->address }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">city</div>
                <div class="col-lg-9 col-md-8">{{ $warehouse->city }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">zip</div>
                <div class="col-lg-9 col-md-8">{{ $warehouse->zip }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $warehouse->state->name }}</div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('warehouse.index') }}" class="btn btn-secondary">Back</a>
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