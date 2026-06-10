@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <a href="{{ route('categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Category
            </a>
        </div>

        @if ($message = session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($message = session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($categories->isEmpty())
            <div class="card shadow">
                <div class="card-body">
                    No categories found. <a href="{{ route('categories.create') }}">Create one now</a>
                </div>
            </div>
        @else
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">
                                            View
                                        </a>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        @endif

    </div>
@endsection
