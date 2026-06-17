@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Blog Post</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">There were some problems with your submission:</h5>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $blog->title) }}"
                                placeholder="Enter blog post title"
                                class="form-control @error('title') is-invalid @enderror"
                            >
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category Field -->
                        <div class="form-group">
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="form-control @error('category_id') is-invalid @enderror"
                            >
                                <option value="">-- Select a Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $blog->category_id) == $category->id)>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Content Field -->
                        <div class="form-group">
                            <label for="content">Content <span class="text-danger">*</span></label>
                            <textarea
                                id="content"
                                name="content"
                                rows="10"
                                placeholder="Write your blog post content here..."
                                class="form-control @error('content') is-invalid @enderror"
                            >{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image Field -->
                        <div class="form-group">
                            <label for="image">Featured Image</label>

                            @if($blog->image)
                                <div class="mb-3 p-3 bg-light rounded">
                                    <p class="text-muted font-weight-bold mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail" style="max-width: 300px;">
                                    <div class="mt-2">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remove_image" class="custom-control-input">
                                            <span class="custom-control-label text-danger">Remove current image</span>
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <div class="border border-dashed rounded p-4 text-center" id="imageDropZone" style="cursor: pointer;">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                                <div class="mt-2">
                                    <p class="text-muted mb-1">
                                        <label for="image" class="text-primary font-weight-bold" style="cursor: pointer;">
                                            Click to upload a new image
                                        </label>
                                        or drag and drop
                                    </p>
                                    <p class="text-muted small">PNG, JPG, GIF up to 2MB</p>
                                </div>
                                <input type="file" id="image" name="image" accept="image/*"
                                    class="form-control d-none @error('image') is-invalid @enderror">
                            </div>
                            @error('image')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Post
                            </button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Drag and drop file upload
    const imageDropZone = document.getElementById('imageDropZone');
    const imageInput = document.getElementById('image');

    imageDropZone.addEventListener('click', () => imageInput.click());

    imageDropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        imageDropZone.classList.add('bg-light');
    });

    imageDropZone.addEventListener('dragleave', () => {
        imageDropZone.classList.remove('bg-light');
    });

    imageDropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        imageDropZone.classList.remove('bg-light');
        imageInput.files = e.dataTransfer.files;
    });

    imageInput.addEventListener('change', () => {
        if (imageInput.files.length > 0) {
            imageDropZone.innerHTML = '<i class="fas fa-check-circle text-success fa-3x mb-2"></i><p class="text-success mt-2">' + imageInput.files[0].name + '</p>';
        }
    });
</script>
@endsection
