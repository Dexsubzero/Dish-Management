@extends('auth.layout')

@section('auth')
<body class="bg-light">

    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Login</h2>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
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

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success btn-lg">Login</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="/register" class="text-decoration-none">Register</a>
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
    </script>

</body>
@endsection