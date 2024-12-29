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
                                    <h3 class="card-title pb-2" style="font-weight: bold;">Join Us Today!</h3>
                                    <p class="text-muted small mb-4">Create your account and start exploring our platform.</p>
                                </div>

                                <form class="row g-3 needs-validation" action="{{ route('registration') }}" method="post" novalidate>
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Full Name</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" placeholder="Enter your full name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email Address</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" placeholder="Enter your email address" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" placeholder="Create a secure password" required>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" style="font-weight: bold;" type="submit">Create Account</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('/') }}" class="text-primary">Sign In</a></p>
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
