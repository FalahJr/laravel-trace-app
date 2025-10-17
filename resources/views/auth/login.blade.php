<x-auth-layout title="Login">
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <div class="logo-wrapper">
                    <img src="{{ asset('img/elevate-logo.png') }}" alt="Elevate Logo" class="logo-img"
                        style="width: 70% !important; margin: 0 auto; display: block;">

                </div>
            </div>

            <div class="card-body px-4">
                <h4 class="text-center mb-4" style="color: #1B262C; font-weight: 600;">Login to Your Account</h4>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="emailOrUsername">Email / Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="emailOrUsername" type="text"
                                class="form-control @error('emailOrUsername') is-invalid @enderror"
                                name="emailOrUsername" value="{{ old('emailOrUsername') }}"
                                placeholder="Enter your email or username" required autocomplete="emailOrUsername"
                                autofocus>
                        </div>
                        @error('emailOrUsername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter your password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1"
                                    id="toggle-password-btn">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <i class="fas fa-key mr-1"></i> Forgot Your Password?
                            </a>
                        @endif
                        {{-- <div class="mt-3">
                            <a class="btn btn-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus mr-1"></i> Belum Punya Akun? Register
                            </a>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Script khusus untuk halaman login
            document.addEventListener('DOMContentLoaded', function() {
                const toggleBtn = document.getElementById('toggle-password-btn');
                const passwordInput = document.getElementById('password');

                if (toggleBtn && passwordInput) {
                    toggleBtn.addEventListener('click', function() {
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            this.querySelector('i').className = 'fas fa-eye-slash';
                        } else {
                            passwordInput.type = 'password';
                            this.querySelector('i').className = 'fas fa-eye';
                        }
                    });
                }
            });
        </script>
    @endpush
</x-auth-layout>
