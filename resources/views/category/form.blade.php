<form class="row g-3 needs-validation"
    action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST"
    novalidate>
    @csrf
    @if(isset($category))
    @method('PUT')
    @endif
    <div class="row mt-4 mb-4">
        <div class="col">
            <label for="category" class="form-label">Name</label>
            <input type="text" class="form-control search-field" data-field="category" id="category" name="category"
                value="{{ isset($category) ? $category->category : "" }}" required>
            <div class="invalid-feedback">Please enter your category name!</div>
        </div>
    </div>
    <div class="border-bottom"></div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>