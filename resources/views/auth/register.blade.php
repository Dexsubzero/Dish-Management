@extends('auth.layout')

@section('auth')
<body class="bg-light">

    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Register</h2>
                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                                <label for="name">Full Name</label>
                                @error('name')
                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                <label for="email">Email address</label>
                                @error('email')
                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="password_confirmation" class="form-control" id="confirm-password" placeholder="Confirm Password">
                                        <label for="confirm-password">Confirm Password</label>
                                        @error('password_confirmation')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-warning btn-lg" style="background-color: #FF9C00; color: hsl(0, 0%, 95%); font-weight: bold;">Register</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <span class="text-muted">Already have an account?</span>
                            <a href="/login" class="text-decoration-none">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const confirmPasswordInput = document.getElementById('confirm-password');
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>

</body>
@endsection
