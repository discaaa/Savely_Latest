@extends('components.layout.navbar')

@section('content')

<style>

    body{
        background: linear-gradient(
            135deg,
            #f3e8ff,
            #ffffff
        );
        min-height: 100vh;
        overflow-x: hidden;
    }

    .register-section{
        min-height: 88vh;
        display: flex;
        align-items: center;
        padding: 40px 0;
    }

    .hero-title{
        font-size: 58px;
        font-weight: 800;
        color: #6f2cff;
        line-height: 1.2;
    }

    .hero-desc{
        font-size: 18px;
        color: #6b7280;
        margin-top: 20px;
        max-width: 550px;
        line-height: 1.8;
    }

    .hero-img{
        width: 100%;
        max-width: 500px;
        animation: floatAnim 4s ease-in-out infinite;
    }

    @keyframes floatAnim{

        0%{
            transform: translateY(0px);
        }

        50%{
            transform: translateY(-12px);
        }

        100%{
            transform: translateY(0px);
        }

    }

    .register-card{
        background: white;
        border-radius: 35px;
        padding: 45px;
        box-shadow: 0 15px 40px rgba(111,44,255,0.12);
        position: relative;
        overflow: hidden;
    }

    .register-card::before{
        content: '';
        position: absolute;
        top: -70px;
        right: -70px;
        width: 180px;
        height: 180px;
        background: rgba(111,44,255,0.08);
        border-radius: 50%;
    }

    .register-card::after{
        content: '';
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 150px;
        height: 150px;
        background: rgba(168,85,247,0.08);
        border-radius: 50%;
    }

    .register-title{
        font-weight: 800;
        color: #111827;
    }

    .register-subtitle{
        color: #6b7280;
        margin-bottom: 30px;
    }

    .form-label{
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-control{
        border-radius: 16px;
        padding: 14px;
        border: 1px solid #ddd;
        transition: 0.3s;
    }

    .form-control:focus{
        border-color: #6f2cff;
        box-shadow: 0 0 0 0.2rem rgba(111,44,255,0.15);
    }

    .register-btn{
        width: 100%;
        border: none;
        background: #6f2cff;
        color: white;
        padding: 15px;
        border-radius: 16px;
        font-weight: bold;
        transition: 0.3s;
        margin-top: 10px;
    }

    .register-btn:hover{
        background: #5b21b6;
        transform: translateY(-2px);
    }

    .login-link{
        color: #6f2cff;
        text-decoration: none;
        font-weight: 700;
    }

    .login-link:hover{
        color: #5b21b6;
    }

    .error-text{
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

</style>

<div class="container register-section">

    <div class="row align-items-center w-100">

        {{-- LEFT --}}
        <div class="col-lg-6">

            <h1 class="hero-title">
                Start Your <br>
                Smart Saving Journey 💸
            </h1>

            <p class="hero-desc">

                Join SaveLy and take control of your finances.
                Plan goals, manage savings, and build better
                financial habits every day.

            </p>

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png"
                 class="hero-img mt-4">

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-5 offset-lg-1">

            <div class="register-card">

                <h2 class="register-title">
                    Create Account ✨
                </h2>

                <p class="register-subtitle">
                    Register and begin your saving journey today.
                </p>

                <form action="{{ route('register.store') }}"
                      method="POST">

                    @csrf

                    {{-- Username --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Enter your username"
                               value="{{ old('username') }}">

                        @error('username')
                            <div class="error-text">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Enter your email"
                               value="{{ old('email') }}">

                        @error('email')
                            <div class="error-text">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter your password">

                        @error('password')
                            <div class="error-text">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">

                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Confirm your password">

                    </div>

                    <button type="submit"
                            class="register-btn">

                        Create Account

                    </button>

                </form>

                <div class="text-center mt-4">

                    <small class="text-secondary">

                        Already have an account?

                        <a href="{{ route('login') }}"
                           class="login-link">

                            Login

                        </a>

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection