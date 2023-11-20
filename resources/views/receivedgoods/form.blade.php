<form class="row g-3 needs-validation"
    action="{{ isset($receivedGood) ? route('receivedgoods.update', $receivedGood->id) : route('receivedgoods.store') }}" method="POST"
    novalidate>
    @csrf
    @if(isset($receivedGood))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="client" class="form-label">Good</label>
            <select id="client" class="form-select" name="good_id" required>
                <option value="">Choose...</option>
                @foreach ($goods as $good)
                <option value="{{ $good->id }}" {{ isset($receivedGood) && $receivedGood->good_id == $good->id || old('good_id') == $good->id ? 'selected' : ''}}>{{$good->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose good!</div>
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ isset($receivedGood) ? $receivedGood->quantity : old('quantity') }}" required>
            <div class="invalid-feedback">Please enter quantity!</div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="supplier" class="form-label">Supplier</label>
            <select id="supplier" class="form-select" name="supplier_id" required>
                <option value="">Choose...</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ isset($receivedGood) && $receivedGood->supplier_id == $supplier->id || old('supplier_id') == $supplier->id ? 'selected' : ''}}>{{$supplier->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose supplier!</div>
        </div>
        <div class="col-md-6">
            <label for="client" class="form-label">Client</label>
            <select id="client" class="form-select" name="client_id" required>
                <option value="">Choose...</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ isset($receivedGood) && $receivedGood->client_id == $client->id || old('client_id') == $client->id ? 'selected' : ''}}>{{$client->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose client!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-4">
            <label for="size" class="form-label">Size</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ isset($receivedGood) ? $receivedGood->size : old('size') }}" required>
            <div class="invalid-feedback">Please enter size!</div>
        </div>
        <div class="col-md-4">
            <label for="weight" class="form-label">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" value="{{ isset($receivedGood) ? $receivedGood->weight : old('weight') }}" required>
            <div class="invalid-feedback">Please enter weight!</div>
        </div>
        <div class="col-md-4">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ isset($receivedGood) ? $receivedGood->amount : old('amount') }}" required>
            <div class="invalid-feedback">Please enter amount!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('receivedgoods.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>