<form class="row g-3 needs-validation" action="{{ route('vehicletype.store') }}" method="POST" novalidate>
    @csrf
    <div class="row mt-2 mb-4">
        <div class="col">
            <label for="vehicle_type" class="form-label">Vehicle type</label>
            <input class="form-control" type="text" id="vehicle_type" name="name" required>
            <div class="invalid-feedback">Please enter vehicle type!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('vehicletype.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>