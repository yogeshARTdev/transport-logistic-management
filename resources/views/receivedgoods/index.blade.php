@extends('layouts.app')
@section('content')
<main id="main" class="main">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('receivedgoods.index') }}"><h5 class="card-title">All received goods</h5>
                <div class="card-title">
                    <a href="{{ route('receivedgoods.create') }}" class="btn btn-sm btn-primary mr-2">Create received
                        goods</a>
                    <a href="{{ route('receivedgoods.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('receivedgoods-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Goods name</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Client</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Size</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('receivedgoods-search') }}" method="GET">
                        <tr>
                            <td class="col-sm-1"><input type="search" name="search[id]" class="form-control search_id">
                            </td>
                            <td class="col-sm-2"><input type="search" name="search[goods]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[supplier]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[client]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[quantity]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[size]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[weight]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[amount]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>
                </thead>
                <tbody>
                    @foreach ($receivedGoods as $receivedGood)
                    <tr>
                        <td>{{ $receivedGood->id }}</td>
                        <td>{{ $receivedGood->good->name }}</td>
                        <td>{{ $receivedGood->supplier->name }}</td>
                        <td>{{ $receivedGood->client->name }}</td>
                        <td>{{ $receivedGood->quantity }}</td>
                        <td>{{ $receivedGood->size }}</td>
                        <td>{{ $receivedGood->weight }}</td>
                        <td>{{ $receivedGood->amount }}</td>
                        <td>
                            @include('receivedgoods.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $receivedGoods->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')