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
            <a href="{{ route('vehicle.index') }}"><h5 class="card-title">All vehicle</h5>
                <div class="card-title">
                    <a href="{{ route('vehicle.create') }}" class="btn btn-sm btn-primary mr-2">Create vehicle</a>
                    <a href="{{ route('vehicle.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('vehicle-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Vehicle type</th>
                        <th scope="col">Registration number</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('vehicle-search') }}" method="GET">
                        <tr>
                            <td class="col"><input type="search" name="search[id]" class="form-control search_id"></td>
                            <td class="col-sm-7"><input type="search" name="search[vehicle]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-3"><input type="search" name="search[registration_number]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>
                </thead>
                <tbody id="table-body">
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->vehicleType->name }}</td>
                        <td>{{ $vehicle->registration_number }}</td>
                        <td>
                            @include('vehicle.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')