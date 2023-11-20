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
            <a href="{{ route('trip.index') }}"><h5 class="card-title">All trip</h5>
                <div class="card-title">
                    <a href="{{ route('trip.create') }}" class="btn btn-sm btn-primary mr-2">Create trip</a>
                    <a href="{{ route('trip.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('trip-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Driver</th>
                        <th scope="col">Goods</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('trip-search') }}" method="GET">
                        <tr>
                            <td class="col-sm-1"><input type="search" name="search[id]" class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[vehicle]" class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[driver]" class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[goods]" class="form-control search_id"></td>
                            <td class="col-sm-1"><input type="search" name="search[quantity]" class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[from]" class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[to]" class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                    <tr>
                        <td>{{ $trip->id }}</td>
                        <td>{{ $trip->vehicle->registration_number }}</td>
                        <td>{{ $trip->driver->name}}</td>
                        <td>{{$trip->goods->name}}</td>
                        <td>{{$trip->quantity}}</td>
                        <td>{{$trip->from}}</td>
                        <td>{{$trip->to}}</td>
                        <td>
                            @include('trip.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $trips->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')