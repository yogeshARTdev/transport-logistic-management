@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Supplier details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Name</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->email }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->mobile }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">GST IN</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->gstin }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">City</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->city }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->state->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Zip</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->zip }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $supplier->address }}</div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Back</a>
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