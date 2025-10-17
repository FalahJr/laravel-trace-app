@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @method('PUT')
                        @include('layouts.users._form')
                        <div class="text-right">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
