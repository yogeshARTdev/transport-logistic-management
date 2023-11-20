<form class="row g-3 needs-validation"
    action="{{ isset($driver) ? route('driver.update', $driver->id) : route('driver.store') }}" enctype="multipart/form-data" method="POST" novalidate>
    @csrf
    @if(isset($driver))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName5" name="name" value="{{ isset($driver) ? $driver->name : old('name') }}" required>
            <div class="invalid-feedback">Please enter your name!</div>
        </div>
        <div class="col-6">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile" value="{{ isset($driver) ? $driver->mobile : old('mobile') }}" required>
            <div class="invalid-feedback">Please enter your mobile!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="license" class="form-label">License</label>
            <input type="text" class="form-control" id="license" name="license" value="{{ isset($driver) ? $driver->license : old('license') }}" required>
            <div class="invalid-feedback">Please enter your license number!</div>
        </div>
        <div class="col-md-6">
            <label for="license_file" class="form-label">File Upload</label>
            <input class="form-control" type="file" id="license_file" name="license_file" required>
            <div class="invalid-feedback">Please choose your license file!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{ isset($driver) ? $driver->address : old('address') }}"
                placeholder="Apartment, studio, or floor" required>
            <div class="invalid-feedback">Please enter your address!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-md-4">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{ isset($driver) ? $driver->city : old('city') }}" required>
            <div class="invalid-feedback">Please enter your city!</div>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" name="state_id" required>
                <option value="">Choose...</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" {{ isset($driver) && $driver->state_id == $state->id || old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose your state!</div>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip" value="{{ isset($driver) ? $driver->zip : old('zip') }}" required>
            <div class="invalid-feedback">Please enter zip!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('driver.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>