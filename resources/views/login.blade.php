@extends('layouts.template')

@section('title', 'Login - Fadhlur Laundry')

@section('content')
<div class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <!-- Login Card -->
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="login-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user-lock fa-2x"></i>
                            </div>
                            <h2 class="fw-bold text-primary mb-2">Selamat Datang Kembali</h2>
                            <p class="text-muted">Masuk ke akun Anda untuk melanjutkan</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" id="loginForm" style="position: relative; z-index: 10;">
                            @csrf

                                                        <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       placeholder="Masukkan email Anda"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       placeholder="Masukkan password Anda"
                                       required>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-4" id="loginBtn" style="position: relative; z-index: 100;">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </button>

                                                        <!-- Register Link -->
                            <div class="text-center pt-3 border-top">
                                <p class="text-muted mb-0">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">
                                        <i class="fas fa-user-plus me-1"></i>Daftar sekarang
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Info Card -->
                <div class="card border-0 bg-light mt-4">
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt text-primary fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">Aman</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-item">
                                    <i class="fas fa-clock text-success fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">Cepat</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-item">
                                    <i class="fas fa-headset text-info fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">24/7 Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<style>
.login-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: calc(100vh - 200px);
    position: relative;
    overflow: hidden;
}

.login-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%230d6efd" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    opacity: 0.3;
}

.card {
    border-radius: 1rem;
    overflow: hidden;
    position: relative;
    z-index: 1;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
}

.login-icon {
    transition: transform 0.3s ease;
}

.login-icon:hover {
    transform: scale(1.1);
}

.form-control {
    border-radius: 0.75rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-label {
    color: #495057;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    transition: color 0.3s ease;
}

.form-label i {
    color: var(--primary-color);
    margin-right: 0.5rem;
}

.btn {
    border-radius: 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.btn-outline-secondary {
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    transform: translateY(-1px);
}

.form-check-input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.feature-item {
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-2px);
}

/* Loading animation for submit button */
.btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .card-body {
        padding: 2rem 1.5rem !important;
    }

    .login-icon {
        width: 60px !important;
        height: 60px !important;
    }

    .login-icon i {
        font-size: 1.5rem !important;
    }
}

/* Custom validation styles */
.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Animation for form elements */
.form-control:focus + .form-label {
    color: var(--primary-color);
}

/* Enhanced form styling */
.form-control {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(5px);
}

.form-control:focus {
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25), 0 8px 25px rgba(0, 0, 0, 0.1);
}

/* Login icon animation */
.login-icon {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Ensure form inputs are properly visible */
.form-floating > .form-control {
    z-index: 1;
    position: relative;
}

.form-floating > label {
    z-index: 2;
    position: relative;
}

/* Ensure form is properly accessible */
form {
    position: relative;
    z-index: 1;
}

/* Make sure buttons are clickable */
.btn {
    position: relative;
    z-index: 10;
    cursor: pointer;
}

/* Ensure form controls are not hidden */
.form-control {
    position: relative;
    z-index: 1;
}



/* Card shadow animation */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple form handling
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');

    if (form && loginBtn) {
        form.addEventListener('submit', function(event) {
            const email = document.getElementById('email');
            const password = document.getElementById('password');

            // Basic validation
            if (!email.value || !password.value) {
                event.preventDefault();
                alert('Mohon isi email dan password');
                return;
            }

            // Show loading state
            loginBtn.innerHTML = '<span class="loading"></span> Memproses...';
            loginBtn.disabled = true;

            // Allow form to submit normally
            console.log('Form submitting...');
        });
    }

    // Debug: Log form elements
    console.log('Form:', form);
    console.log('Login button:', loginBtn);
    console.log('Email field:', document.getElementById('email'));
    console.log('Password field:', document.getElementById('password'));
});

    // Password visibility toggle (optional enhancement)
    const passwordField = document.getElementById('password');
    const togglePassword = document.createElement('button');
    togglePassword.type = 'button';
    togglePassword.className = 'btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3';
    togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
    togglePassword.style.zIndex = '10';

    const passwordContainer = passwordField.parentElement;
    passwordContainer.style.position = 'relative';
    passwordContainer.appendChild(togglePassword);

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });

    // Auto-hide validation messages after 5 seconds
    setTimeout(() => {
        const invalidFeedbacks = document.querySelectorAll('.invalid-feedback');
        invalidFeedbacks.forEach(feedback => {
            if (feedback.style.display !== 'none') {
                feedback.style.opacity = '0';
                setTimeout(() => {
                    feedback.style.display = 'none';
                }, 500);
            }
        });
    }, 5000);
});
</script>
@endpush
@endsection
