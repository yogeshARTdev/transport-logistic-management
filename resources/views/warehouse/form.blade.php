<form class="row g-3 needs-validation"
    action="{{ isset($warehouse) ? route('warehouse.update', $warehouse->id) : route('warehouse.store') }}" method="POST"
    novalidate>
    @csrf
    @if(isset($warehouse))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="warehouse" class="form-label">Warehouse name</label>
            <input type="text" class="form-control" id="warehouse" name="name" value="{{ isset($warehouse) ? $warehouse->name : old('warehouse') }}" required>
            <div class="invalid-feedback">Please enter warehouse name!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{ isset($warehouse) ? $warehouse->address : old('address') }}" placeholder="Apartment, studio, or floor"
                required>
            <div class="invalid-feedback">Please enter your address!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip" value="{{ isset($warehouse) ? $warehouse->zip : old('zip') }}" required>
            <div class="invalid-feedback">Please enter zip!</div>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{ isset($warehouse) ? $warehouse->city : old('city') }}" required>
            <div class="invalid-feedback">Please enter your city!</div>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" name="state_id" required>
                <option value="">Choose...</option>
                @foreach ($states as $state)
                <option value="{{$state->id}}"
                    {{ isset($warehouse) && $warehouse->state_id == $state->id || old('state_id') == $state->id ? 'selected' : ''}}>
                    {{ $state->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose your state!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('warehouse.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>