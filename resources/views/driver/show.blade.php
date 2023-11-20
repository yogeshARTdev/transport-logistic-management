@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Driver details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Name</div>
                <div class="col-lg-9 col-md-8">{{ $driver->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile</div>
                <div class="col-lg-9 col-md-8">{{ $driver->mobile }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">License</div>
                <div class="col-lg-9 col-md-8">{{ $driver->license }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 label">License file</div>
                <div class="col-lg-8 col-md-4">
                    {{ $driver->license_file }}
                </div>
                <div class="col-lg-1 col-md-4 text-end">
                    <a href="{{ Storage::url('license/' . $driver->license_file) }}" target="_blank" class="btn btn-default btn-primary btn-xs">
                        View
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $driver->address }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">City</div>
                <div class="col-lg-9 col-md-8">{{ $driver->city }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $driver->state->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Zip</div>
                <div class="col-lg-9 col-md-8">{{ $driver->zip }}</div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('driver.index') }}" class="btn btn-secondary">Back</a>
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