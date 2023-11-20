<form class="row g-3 needs-validation"
    action="{{ isset($client) ? route('client.update', $client->id) : route('client.store') }}" method="POST" novalidate>
    @csrf
    @if(isset($client))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName5" name="name" value="{{ isset($client) ? $client->name : old('name') }}" required>
            <div class="invalid-feedback">Please enter your name!</div>
        </div>
        <div class="col-md-6">
            <label for="inputEmail5" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail5" name="email" value="{{ isset($client) ? $client->email : old('email') }}" required>
            <div class="invalid-feedback">Please enter your email!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="gstin" class="form-label">GST IN</label>
            <input type="text" class="form-control" id="gstin" name="gstin" value="{{ isset($client) ? $client->gstin : old('gstin') }}" maxlength="15" required>
            <div class="invalid-feedback">Please enter your GST IN!</div>
        </div>
        <div class="col-6">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile" value="{{ isset($client) ? $client->mobile : old('mobile') }}" maxlength="10" required>
            <div class="invalid-feedback">Please enter your mobile!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" value="{{ isset($client) ? $client->address : old('address') }}" placeholder="Apartment, studio, or floor"
                name="address" required>
            <div class="invalid-feedback">Please enter your address!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-md-4">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{ isset($client) ? $client->city : old('city') }}" required>
            <div class="invalid-feedback">Please enter your city!</div>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" name="state_id" required>
                <option value="">Choose...</option>
                @foreach ($states as $state)
                <option value="{{$state->id}}" {{ isset($client) && $client->state_id == $state->id || old('state_id') == $state->id ? 'selected' : ''}}>{{ $state->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose your state!</div>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip" value="{{ isset($client) ? $client->zip : old('zip') }}" required>
            <div class="invalid-feedback">Please enter zip!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>