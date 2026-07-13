@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Role Details</h1>
            <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Name:</strong>
                    <span class="badge badge-primary">{{ $role->name }}</span>
                </div>
                <div>
                    <strong>Permissions:</strong><br>
                    @forelse ($rolePermissions as $v)
                        <span class="badge badge-success mt-1">{{ $v->name }}</span>
                    @empty
                        <span class="text-muted">No permissions assigned.</span>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
@endsection
