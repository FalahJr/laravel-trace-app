<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title . ' - ' : '' }} Trace App</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <style>
        body {
            background: linear-gradient(to bottom, #1B262C, #0F4C75);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(27, 38, 44, 0.25);
        }

        .card-header {
            background-color: #0F4C75;
            color: white;
            text-align: center;
            padding: 0px 0px !important;
            border-bottom: none;
            width: 70% !important;
        }

        .logo-wrapper {
            text-align: center;
            /* margin-bottom: 0.5rem; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .logo-img {
            max-width: 250px;
            height: auto;
            margin: 0 auto;
        }



        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #3282B8;
            box-shadow: 0 0 0 0.2rem rgba(50, 130, 184, 0.25);
        }

        .btn-primary {
            background-color: #3282B8;
            border-color: #3282B8;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0F4C75;
            border-color: #0F4C75;
            transform: translateY(-2px);
        }

        .btn-link {
            color: #3282B8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-link:hover {
            color: #1B262C;
            text-decoration: underline;
        }

        .input-group-append .btn {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            background-color: #e2e8f0;
            border-color: #e2e8f0;
        }

        .input-group-text {
            background-color: #e2e8f0;
            border-color: #e2e8f0;
        }

        .form-check-input:checked {
            background-color: #3282B8;
            border-color: #3282B8;
        }

        label {
            color: #1B262C;
            font-weight: 600;
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .auth-footer {
            text-align: center;
            /* margin-top: 30px; */
            color: #BBE1FA;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>
    <div class="auth-footer">
        &copy; {{ date('Y') }} Trace App. All rights reserved.
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script>
        // Script global untuk memastikan toggle password berfungsi
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi toggle password sebagai fallback
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-toggle') || 'password';
                    const passwordInput = document.getElementById(targetId) || document
                        .querySelector('#' + targetId) || document.querySelector(
                            'input[type="password"]');
                    const icon = this.querySelector('i');

                    if (passwordInput && passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        if (icon) icon.className = 'fas fa-eye-slash';
                    } else if (passwordInput) {
                        passwordInput.type = 'password';
                        if (icon) icon.className = 'fas fa-eye';
                    }
                });
            });
        });
    </script>

    {{ $scripts ?? '' }}
</body>

</html>
