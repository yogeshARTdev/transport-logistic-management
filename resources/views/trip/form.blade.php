<form class="row g-3 needs-validation"
    action="{{ isset($trip) ? route('trip.update', $trip->id) : route('trip.store') }}" enctype="multipart/form-data"
    method="POST" novalidate>
    @csrf
    @if(isset($trip))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="vehicle" class="form-label">Vehicle</label>
            <select id="vehicle" class="form-select" name="vehicle_id" required>
                <option value="">Choose...</option>
                @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}"
                    {{ isset($trip) && $trip->vehicle_id == $vehicle->id || old('vehicle_id') == $vehicle->id ? 'selected' : ''}}>
                    {{ $vehicle->registration_number }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose vehicle!</div>
        </div>
        <div class="col-md-6">
            <label for="driver" class="form-label">Driver</label>
            <select id="driver" class="form-select" name="driver_id" required>
                <option value="">Choose...</option>
                @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}"
                    {{ isset($trip) && $trip->driver_id == $driver->id || old('driver_id') == $driver->id ? 'selected' : ''}}>
                    {{ $driver->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose driver!</div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="goods" class="form-label">Goods</label>
            <select id="goods" class="form-select" name="goods_id" required>
                <option value="">Choose...</option>
                @foreach ($goods as $good)
                <option value="{{ $good->id }}"
                    {{ isset($trip) && $trip->goods_id == $good->id || old('goods_id') == $good->id ? 'selected' : ''}}>
                    {{ $good->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose goods!</div>
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity"
                value="{{ isset($trip) ? $trip->quantity: old('quantity') }}" required>
            <div class="invalid-feedback">Please enter quantity!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-6 mt-2">
            <label for="from_address" class="form-label">From</label>
            <input type="text" class="form-control" id="from_address" name="from"
                value="{{ isset($trip) ? $trip->from: old('from') }}" placeholder="Apartment, studio, or floor"
                required>
            <div class="invalid-feedback">Please enter from address!</div>
        </div>
        <div class="col-6 mt-2">
            <label for="to_address" class="form-label">To</label>
            <input type="text" class="form-control" id="to_address" name="to" placeholder="Apartment, studio, or floor"
                value="{{ isset($trip) ? $trip->to: old('to') }}" required>
            <div class="invalid-feedback">Please enter to address!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('trip.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>