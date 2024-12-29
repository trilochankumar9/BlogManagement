@extends('layout.main')
@section('content')

<main>
    <div class="container">
        @include('validation.session-message')

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7 d-flex flex-column align-items-center justify-content-center">
                        <div class="card shadow-lg border-0 mb-3" style="border-radius: 15px;">

                            <div class="card-body p-4">
                                <div class="text-center pt-4 pb-3">
                                    <h3 class="card-title pb-2" style="font-weight: bold;">Welcome Back!</h3>
                                    <p class="text-muted small mb-4">Sign in to access your personalized dashboard.</p>
                                </div>

                                <form class="row g-3 needs-validation" action="{{ route('/login') }}" method="post" novalidate>
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email Address</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text bg-primary text-white" id="inputGroupPrepend">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Enter your email" required>
                                            <div class="invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter your password" required>
                                            <div class="invalid-feedback">Password is required.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                                        </div>
                                        <a href="#" class="small text-primary">Forgot Password?</a>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-success w-100" style="font-weight: bold;" type="submit">Sign In</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p class="small mb-2">Or continue with</p>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <a href="{{ route('login.google') }}" class="btn btn-outline-danger w-100 me-2">
                                            <i class="bi bi-google"></i> Google
                                        </a>
                                        <a href="#" class="btn btn-outline-primary w-100 ms-2">
                                            <i class="bi bi-facebook"></i> Facebook
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mt-3">
                                        <p class="small mb-0">Don't have an account? <a href="{{ route('/register') }}" class="text-primary">Sign Up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <p class="text-muted small">&copy; 2024 Your Company. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection
