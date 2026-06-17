@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blog Posts</h1>
        <a href="{{ route('blogs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create New Post
        </a>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>
                                <div class="font-weight-bold">{{ $blog->title }}</div>
                                <small class="text-muted">{{ $blog->slug }}</small>
                            </td>
                            <td>
                                <span class="badge badge-primary">{{ $blog->category->title }}</span>
                            </td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light p-2 rounded" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No blog posts found. <a href="{{ route('blogs.create') }}">Create one now.</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
