@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Vehicle details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Vehicle type</div>
                <div class="col-lg-9 col-md-8">{{ $vehicle->vehicleType->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Registration number</div>
                <div class="col-lg-9 col-md-8">{{ $vehicle->registration_number }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 label">Registration certificate</div>
                <div class="col-lg-8 col-md-4">
                    {{ $vehicle->registration_certificate }}
                </div>
                <div class="col-lg-1 col-md-4 text-end">
                    <a href="{{ Storage::url('vehicle/' . $vehicle->registration_certificate) }}" target="_blank" class="btn btn-default btn-primary btn-xs">
                        View
                    </a>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 label">FC certificate</div>
                <div class="col-lg-8 col-md-4">
                    {{ $vehicle->fc_certificate }}
                </div>
                <div class="col-lg-1 col-md-4 text-end">
                    <a href="{{ Storage::url('vehicle/' .  $vehicle->fc_certificate) }}" target="_blank" class="btn btn-default btn-primary btn-xs">
                        View
                    </a>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 label">Insurence</div>
                <div class="col-lg-8 col-md-4">
                    {{ $vehicle->insurence_file }}
                </div>
                <div class="col-lg-1 col-md-4 text-end">
                    <a href="{{ Storage::url('vehicle/' . $vehicle->insurence_file) }}" target="_blank" class="btn btn-default btn-primary btn-xs">
                        View
                    </a>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('vehicle.index') }}" class="btn btn-secondary">Back</a>
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