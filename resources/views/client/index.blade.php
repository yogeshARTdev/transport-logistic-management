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
            <a href="{{ route('client.index') }}"><h5 class="card-title">All client</h5></a>
                <div class="card-title">
                    <a href="{{ route('client.create') }}" class="btn btn-sm btn-primary mr-2">Create client</a>
                    <a href="{{ route('client.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('client-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">GST IN</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('client-search') }}" method="GET">
                        <tr>
                            <td class="col-sm-1"><input type="search" name="search[id]" class="form-control search_id">
                            </td>
                            <td class="col-sm-2"><input type="search" name="search[name]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[email]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[mobile]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[gstin]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-2"><input type="search" name="search[address]"
                                    class="form-control search_id"></td>
                            <td class="col-sm-1"></td>
                        </tr>
                    </form>

                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->mobile }}</td>
                        <td>{{ $client->gstin }}</td>
                        <td>{{ $client->address }}</td>
                        <td>
                            @include('client.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

@include('search')