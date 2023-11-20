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
            <a href="{{ route('category.index') }}"><h5 class="card-title">All category</h5>
                <div class="card-title">
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary mr-2">Create category</a>
                    <a href="{{ route('category.export') }}" class="export-data btn btn-sm btn-success mr-2">Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col" class="sortable" data-sort="desc">id <a
                                href="{{ route('category-sort', ['order' => $order === 'asc' ? 'desc' : 'asc']) }}" class="sort-icon">
                                @if ($order === 'asc')
                                <i class="bi bi-sort-up-alt"></i>
                                @else
                                <i class="bi bi-sort-up"></i>
                                @endif
                            </a>
                        </th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    <form action="{{ route('category-search') }}" method="GET">
                        <tr>
                            <td class="col">
                                <input type="search" name="search[id]" class="form-control search_id">
                            </td>
                            <td class="col-sm-10">
                                <input type="search" name="search[category]" class="form-control search_id">
                            </td>
                            <td class="col-sm-1">
                            </td>
                        </tr>
                    </form>

                </thead>
                <tbody id="table-body">
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category }}</td>
                        <td>
                            @include('category.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $categories->links() }}
            </div>

        </div>
    </div>
</main>
@endsection

@include('search')