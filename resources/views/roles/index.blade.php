@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles</h1>
            @can('role-create')
                <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Create New Role
                </a>
            @endcan
        </div>

        @if ($message = session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($roles->isEmpty())
            <div class="card shadow">
                <div class="card-body">
                    No roles found.
                    @can('role-create')
                        <a href="{{ route('roles.create') }}">Create one now</a>
                    @endcan
                </div>
            </div>
        @else
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th width="80px">#</th>
                                <th>Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $role->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info">
                                            View
                                        </a>
                                        @can('role-edit')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('role-delete')
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                {{ $roles->links() }}
            </div>
        @endif

    </div>
@endsection
