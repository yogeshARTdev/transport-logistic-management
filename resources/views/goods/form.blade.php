<form class="row g-3 needs-validation"
    action="{{ isset($good) ? route('goods.update', $good->id) : route('goods.store') }}" method="POST" novalidate>
    @csrf
    @if(isset($good))
    @method('PUT')
    @endif
    <div class="row mt-4">
        <div class="col-md-6">
            <label for="goodName" class="form-label">Good name</label>
            <input type="text" class="form-control" id="goodName" name="name" value="{{ isset($good) ? $good->name : old('name') }}" {{ isset($good) ? 'disabled' : '' }} required>
            <div class="invalid-feedback">Please enter good name!</div>
        </div>
        <div class="col-md-6">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" name="category_id" required>
                <option value="">Choose...</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id}}"  {{ isset($good) && $good->category_id == $category->id || old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please choose good category!</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ isset($good) ? $good->quantity : old('quantity') }}" required>
            <div class="invalid-feedback">Please enter quantity!</div>
        </div>
        <div class="col-6">
            <label for="size" class="form-label">Size</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ isset($good) ? $good->size : old('size') }}" required>
            <div class="invalid-feedback">Please enter size!</div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-md-6">
            <label for="weight" class="form-label">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" value="{{ isset($good) ? $good->weight : old('weight') }}" required>
            <div class="invalid-feedback">Please enter weight!</div>
        </div>
        <div class="col-md-6">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ isset($good) ? $good->amount : old('amount') }}" required>
            <div class="invalid-feedback">Please enter amount!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('goods.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>