<x-auth-layout title="Register">
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <div class="logo-wrapper">
                    <img src="{{ asset('img/elevate-logo.png') }}" alt="Elevate Logo" class="logo-img"
                        style="width: 70% !important; margin: 0 auto; display: block;">
                    <div class="logo-tagline">Empowering Leadership, Vision, and Teamwork Excellence</div>
                </div>
            </div>

            <div class="card-body p-4">
                <h4 class="text-center mb-4" style="color: #1B262C; font-weight: 600;">Create New Account</h4>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Enter your full name" required
                                autocomplete="name" autofocus>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" placeholder="Choose a unique username" required
                                autocomplete="username">
                        </div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter your email address" required
                                autocomplete="email">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
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
                                placeholder="Create a secure password" required autocomplete="new-password">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
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
                        <label for="password-confirm">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm your password" required
                                autocomplete="new-password">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password-confirm"
                                    tabindex="-1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt mr-1"></i> Already have an account? Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.toggle-password').click(function() {
                    const passwordInput = $('#password');
                    const icon = $(this).find('i');

                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordInput.attr('type', 'password');
                        icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });

                $('.toggle-password-confirm').click(function() {
                    const passwordInput = $('#password-confirm');
                    const icon = $(this).find('i');

                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordInput.attr('type', 'password');
                        icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });
            });
        </script>
    @endpush
</x-auth-layout>
