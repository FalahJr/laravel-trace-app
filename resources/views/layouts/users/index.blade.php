@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Manajemen User</h1>
            <div class="section-header-breadcrumb ml-auto">
                @if (Auth::user()->role == 'diskominfo')
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
                @endif
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="section-body">
            <form method="GET" action="{{ route('users.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" value="{{ $search }}" class="form-control"
                        placeholder="Cari nama/email/role...">
                    <div class="input-group-append">
                        <button class="btn btn-primary ml-2" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge badge-info">{{ $user->role }}</span></td>
                                <td>{{ $user->created_at?->format('Y-m-d H:i') }}</td>
                                <td>
                                    @if (Auth::user()->role == 'diskominfo')
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                            style="display:inline-block" onsubmit="return confirm('Hapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    @else
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info"><i
                                                class="fas fa-eye"></i> Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div>
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
