@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Details</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label class="font-weight-bold">Title</label>
                            <p class="form-control-plaintext">{{ $category->title }}</p>
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label class="font-weight-bold">Slug</label>
                            <p class="form-control-plaintext">{{ $category->slug }}</p>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="font-weight-bold">Description</label>
                            <p class="form-control-plaintext">{{ $category->description ?? 'No description provided' }}</p>
                        </div>

                        <!-- Created At -->
                        <div class="mb-3">
                            <label class="font-weight-bold">Created At</label>
                            <p class="form-control-plaintext">{{ $category->created_at->format('M d, Y H:i') }}</p>
                        </div>

                        <!-- Updated At -->
                        <div class="mb-3">
                            <label class="font-weight-bold">Updated At</label>
                            <p class="form-control-plaintext">{{ $category->updated_at->format('M d, Y H:i') }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
