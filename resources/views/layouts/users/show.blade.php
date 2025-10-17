@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Detail User</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9">{{ $user->id }}</dd>

                        <dt class="col-sm-3">Nama</dt>
                        <dd class="col-sm-9">{{ $user->name }}</dd>

                        <dt class="col-sm-3">Username</dt>
                        <dd class="col-sm-9">{{ $user->username }}</dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>

                        <dt class="col-sm-3">Role</dt>
                        <dd class="col-sm-9"><span class="badge badge-info">{{ $user->role }}</span></dd>

                        <dt class="col-sm-3">Dibuat</dt>
                        <dd class="col-sm-9">{{ $user->created_at?->format('Y-m-d H:i') }}</dd>

                        <dt class="col-sm-3">Diupdate</dt>
                        <dd class="col-sm-9">{{ $user->updated_at?->format('Y-m-d H:i') }}</dd>
                    </dl>
                    <div class="text-right">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
