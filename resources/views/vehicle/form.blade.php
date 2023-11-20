<form class="row g-3 needs-validation"
    action="{{ isset($vehicle) ? route('vehicle.update', $vehicle->id) : route('vehicle.store') }}"
    enctype="multipart/form-data" method="POST" novalidate>
    @csrf
    @if(isset($vehicle))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="vehicle_type" class="form-label">Vehicle type</label>
            <select id="vehicle_type" class="form-select" name="vehicle_type" required>
                <option value="">Choose...</option>
                @foreach ($vehicleTypes as $vehicleType)
                <option value="{{ $vehicleType->id }}"
                    {{ isset($vehicle) && $vehicle->vehicle_type == $vehicleType->id || old('vehicle_type') == $vehicleType->id ? 'selected' : ''}}>
                    {{$vehicleType->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose client!</div>
        </div>
        <div class="col-md-6">
            <label for="registration_number" class="form-label">Registration number</label>
            <input type="text" class="form-control" id="registration_number" name="registration_number"
                value="{{ isset($vehicle) ? $vehicle->registration_number : old('registration_number') }}" required>
            <div class="invalid-feedback">Please enter registration number!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-md-4">
            <label for="insurence" class="form-label">Insurence</label>
            <input class="form-control" type="file" id="insurence" name="insurence_file" required>
            <div class="invalid-feedback">Please choose insurence file!</div>
        </div>
        <div class="col-md-4">
            <label for="fc_certificate" class="form-label">FC certificate</label>
            <input class="form-control" type="file" id="fc_certificate" name="fc_certificate" required>
            <div class="invalid-feedback">Please choose FC certificate file!</div>
        </div>
        <div class="col-md-4">
            <label for="registration_certificate" class="form-label">Registration certificate</label>
            <input class="form-control" type="file" id="registration_certificate" name="registration_certificate"
                required>
            <div class="invalid-feedback">Please choose registration certificate!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('vehicle.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>