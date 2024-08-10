@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Belajar CRUD Livewire</h1>
        <div class="row mb-4">
            <div class="mb-3">
                <a href="{{ route('users.home') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection
