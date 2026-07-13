@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Role</h1>
            <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="form-group">
                        <label><strong>Name</strong></label>
                        <input type="text" name="name" placeholder="Role name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label><strong>Permissions</strong></label>
                        <div class="row">
                            @foreach ($permission as $value)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                                            class="form-check-input" id="permission-{{ $value->id }}">
                                        <label class="form-check-label" for="permission-{{ $value->id }}">
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fas fa-save fa-sm text-white-50"></i> Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
