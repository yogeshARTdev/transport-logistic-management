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
                <a href="{{ route('goods.index') }}">
                    <h5 class="card-title">All goods</h5>
                    <div class="card-title">
                        <a href="{{ route('goods.create') }}" class="btn btn-sm btn-primary mr-2">Create goods</a>
                        <a href="{{ route('goods.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                    </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('goods-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}"
                                class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Goods name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Size</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('goods-search') }}" method="GET">
                        <tr>
                            <td class="col-sm-1"><input type="search" name="search[id]" class="form-control search_id">
                            </td>
                            <td class="col-sm-2"><input type="search" name="search[name]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[category]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[quantity]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[size]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[weight]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[amount]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>
                </thead>
                <tbody>
                    @foreach($goods as $good)
                    <tr>
                        <td>{{ $good->id}}</td>
                        <td>{{ $good->name}}</td>
                        <td>{{ $good->category->category}}</td>
                        <td>{{ $good->quantity}}</td>
                        <td>{{ $good->size}}</td>
                        <td>{{ $good->weight}}</td>
                        <td>{{ $good->amount}}</td>
                        <td>
                            @include('goods.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $goods->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')