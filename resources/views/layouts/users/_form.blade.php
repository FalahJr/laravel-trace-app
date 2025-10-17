@csrf
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
        value="{{ old('username', $user->username ?? '') }}" required>
    @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="role">Role</label>
    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
        @php($currentRole = old('role', $user->role ?? 'user'))
        @foreach ($role as $listRole)
            <option value="{{ $listRole->name }}" {{ $currentRole == $listRole->name ? 'selected' : '' }}>
                {{ ucfirst($listRole->name) }}</option>
        @endforeach
        {{-- <option value="user" {{ $currentRole == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $currentRole == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="diskominfo" {{ $currentRole == 'diskominfo' ? 'selected' : '' }}>Diskominfo</option> --}}
    </select>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="password">Password {{ isset($user) ? '(kosongkan jika tidak diganti)' : '' }}</label>
    <div class="input-group">
        <input type="password" id="password" name="password"
            class="form-control @error('password') is-invalid @enderror" {{ isset($user) ? '' : 'required' }}>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#password"
                aria-label="Tampilkan/sembunyikan password">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <div class="input-group">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
            {{ isset($user) ? '' : 'required' }}>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary toggle-password" type="button"
                data-target="#password_confirmation" aria-label="Tampilkan/sembunyikan konfirmasi password">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        (function() {
            $(document).on('click', '.toggle-password', function() {
                const targetSelector = $(this).data('target');
                const $input = $(targetSelector);
                if (!$input.length) return;
                const isPassword = $input.attr('type') === 'password';
                $input.attr('type', isPassword ? 'text' : 'password');
                const $icon = $(this).find('i');
                $icon.toggleClass('fa-eye fa-eye-slash');
                $(this).attr('aria-pressed', isPassword ? 'true' : 'false');
            });
        })();
    </script>
@endpush
