@extends('components.layout.navbar')

@section('content')

<style>

    body{
        background:
        radial-gradient(circle at top left, #e9d5ff 0%, transparent 30%),
        radial-gradient(circle at bottom right, #d8b4fe 0%, transparent 35%),
        linear-gradient(135deg,#f8f5ff,#ffffff);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .hero-section{
        min-height: calc(100vh - 90px);
        display: flex;
        align-items: center;
        padding: 60px 0;
    }

    .hero-title{
        font-size: 68px;
        font-weight: 900;
        line-height: 1.1;
        color: #5b21b6;
        margin-bottom: 25px;
    }

    .hero-desc{
        font-size: 19px;
        color: #6b7280;
        line-height: 1.8;
        max-width: 560px;
    }

    .hero-highlight{
        color: #6f2cff;
    }

    .hero-img{
        width: 100%;
        max-width: 520px;
        animation: floatAnim 4s ease-in-out infinite;
        filter: drop-shadow(0 15px 30px rgba(111,44,255,0.18));
    }

    @keyframes floatAnim{

        0%{
            transform: translateY(0px);
        }

        50%{
            transform: translateY(-14px);
        }

        100%{
            transform: translateY(0px);
        }

    }

    .login-wrapper{
        position: relative;
    }

    .login-card{
        background: rgba(255,255,255,0.85);
        border: 1px solid rgba(255,255,255,0.5);
        backdrop-filter: blur(18px);
        border-radius: 35px;
        padding: 45px;
        box-shadow:
        0 20px 50px rgba(111,44,255,0.12),
        0 8px 20px rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }

    .login-card::before{
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        background: rgba(168,85,247,0.10);
        border-radius: 50%;
        top: -90px;
        right: -90px;
    }

    .login-card::after{
        content: '';
        position: absolute;
        width: 160px;
        height: 160px;
        background: rgba(111,44,255,0.08);
        border-radius: 50%;
        bottom: -70px;
        left: -60px;
    }

    .login-content{
        position: relative;
        z-index: 2;
    }

    .login-title{
        font-size: 38px;
        font-weight: 800;
        color: #111827;
    }

    .login-subtitle{
        color: #6b7280;
        margin-top: 10px;
        margin-bottom: 35px;
        line-height: 1.7;
    }

    .form-label{
        font-weight: 700;
        color: #374151;
        margin-bottom: 10px;
    }

    .form-control{
        border-radius: 18px;
        padding: 15px 18px;
        border: 1px solid #e5e7eb;
        font-size: 15px;
        transition: 0.3s;
        background: rgba(255,255,255,0.8);
    }

    .form-control:focus{
        border-color: #6f2cff;
        box-shadow: 0 0 0 0.2rem rgba(111,44,255,0.14);
    }

    .verify-btn{
        width: 100%;
        border: none;
        background: linear-gradient(
            135deg,
            #7c3aed,
            #6f2cff
        );
        color: white;
        padding: 15px;
        border-radius: 18px;
        font-weight: 700;
        font-size: 16px;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(111,44,255,0.22);
    }

    .verify-btn:hover{
        transform: translateY(-3px);
        background: linear-gradient(
            135deg,
            #6d28d9,
            #5b21b6
        );
    }

    .signup-link{
        color: #6f2cff;
        font-weight: 700;
        text-decoration: none;
    }

    .signup-link:hover{
        color: #5b21b6;
    }

    .mini-badge{
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(111,44,255,0.10);
        color: #6f2cff;
        padding: 10px 18px;
        border-radius: 999px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .feature-mini{
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .feature-box{
        background: rgba(255,255,255,0.7);
        border-radius: 20px;
        padding: 18px;
        flex: 1;
        box-shadow: 0 6px 20px rgba(0,0,0,0.05);
    }

    .feature-box h6{
        font-weight: 800;
        color: #5b21b6;
        margin-bottom: 8px;
    }

    .feature-box small{
        color: #6b7280;
        line-height: 1.6;
    }

</style>

<div class="container hero-section">

    <div class="row align-items-center w-100">

        <div class="col-lg-6 mb-5 mb-lg-0">

            <h1 class="hero-title">

                Build Better <br>

                <span class="hero-highlight">
                    Financial Habits
                </span>

            </h1>

            <p class="hero-desc">

                SaveLy helps you organize expenses,
                manage savings goals, and grow your
                financial discipline with a modern
                and simple experience.

            </p>

            <div class="feature-mini">

                <div class="feature-box">

                    <h6>
                        Goal Tracking
                    </h6>

                    <small>
                        Monitor your saving progress easily.
                    </small>

                </div>

                <div class="feature-box">

                    <h6>
                        Budget Planning
                    </h6>

                    <small>
                        Control your expenses smarter everyday.
                    </small>

                </div>

            </div>

        </div>

        <div class="col-lg-5 offset-lg-1">

            <div class="login-wrapper">

                <div class="login-card">

                    <div class="login-content">

                        <h2 class="login-title">
                            Welcome Back 👋
                        </h2>

                        <p class="login-subtitle">

                            Continue your journey and
                            start reaching your financial goals.

                        </p>

                        <form action="{{ route('login.store') }}"
                              method="POST">

                            @csrf

                            <div class="mb-4">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter your email">

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Enter your password">

                            </div>

                            <button type="submit"
                                    class="verify-btn">

                                Login to SaveLy

                            </button>

                        </form>

                        <div class="text-center mt-4">

                            <small class="text-secondary">

                                Don't have an account?

                                <a href="{{ route('register') }}"
                                   class="signup-link">

                                    Create Account

                                </a>

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection