@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 70vh;">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-3">Access Denied</p>
            <p class="text-gray-500 mb-4">
                {{ $exception->getMessage() && $exception->getMessage() !== 'This action is unauthorized.' ? $exception->getMessage() : "You don't have permission to view this page." }}
            </p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left fa-sm"></i> Back to Dashboard
            </a>
        </div>
    </div>
@endsection
