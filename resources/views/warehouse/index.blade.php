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
            <a href="{{ route('warehouse.index') }}"><h5 class="card-title">All warehouse</h5>
                <div class="card-title">
                    <a href="{{ route('warehouse.create') }}" class="btn btn-sm btn-primary mr-2">Create warehouse</a>
                    <a href="{{ route('warehouse.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('warehouse-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Zip</th>
                        <th scope="col">State</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('warehouse-search') }}" method="GET">
                        <tr>
                            <td class="col-sm-1"><input type="search" name="search[id]" class="form-control search_id">
                            </td>
                            <td class="col-sm-2"><input type="search" name="search[name]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[address]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[city]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[zip]" class="form-control search_id">
                            </td>
                            <td class="col-sm-2"><input type="search" name="search[state]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>
                </thead>
                <tbody>
                    @foreach ($warehouses as $warehouse)
                    <tr>
                        <td>{{ $warehouse->id }}</td>
                        <td>{{ $warehouse->name }}</td>
                        <td>{{ $warehouse->address }}</td>
                        <td>{{ $warehouse->city }}</td>
                        <td>{{ $warehouse->zip }}</td>
                        <td>{{ $warehouse->state->name }}</td>
                        <td>
                            @include('warehouse.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')