@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="card-title"> Received Goods details</div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Good name</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->good->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Supplier</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->supplier->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">client</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->client->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Quantity</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->quantity }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Size</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->size }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Weight</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->weight }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Amount</div>
                <div class="col-lg-9 col-md-8">{{ $receivedGood->amount }}</div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a href="{{ route('receivedgoods.index') }}" class="btn btn-secondary">Back</a>
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