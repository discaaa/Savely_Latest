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
        padding: 70px 80px;
    }

    .hero-title{
        font-size: 75px;
        font-weight: 900;
        line-height: 1.1;
        color: #4c1d95;
        margin-bottom: 30px;
    }

    .hero-desc{
        font-size: 22px;
        line-height: 1.8;
        color: #5b21b6;
        max-width: 700px;
        font-weight: 500;
    }

    .hero-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 18px;
        padding: 16px 35px;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.3);
    }

    .hero-btn:hover{
        background: #5b21b6;
        transform: translateY(-3px);
        color: white;
    }

    .hero-image{
        width: 100%;
        max-width: 550px;
        border-radius: 50%;
        background: pink;
        padding: 6px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float{

        0%{
            transform: translateY(0px);
        }

        50%{
            transform: translateY(-15px);
        }

        100%{
            transform: translateY(0px);
        }

    }

    .glass-card{
        background: rgba(255,255,255,0.25);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 35px;
        padding: 40px;
        backdrop-filter: blur(12px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .feature-card{
        background: white;
        border-radius: 25px;
        padding: 30px;
        transition: 0.3s;
        height: 100%;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .feature-card:hover{
        transform: translateY(-10px);
    }

    .feature-icon{
        width: 80px;
        margin-bottom: 20px;
    }

    .feature-title{
        font-size: 24px;
        font-weight: bold;
        color: #5b21b6;
    }

    .feature-desc{
        color: #6b7280;
        line-height: 1.7;
    }

    .section-title{
        font-size: 55px;
        font-weight: 900;
        color: #4c1d95;
    }

    .section-desc{
        color: #5b21b6;
        font-size: 20px;
    }

</style>

<div class="container-fluid hero-section">

    <div class="row align-items-center">

        <div class="col-lg-6">

            <h1 class="hero-title">
                Smart Finance, <br>
                Real Goals.
            </h1>

            <p class="hero-desc">

                SaveLy helps you manage your income,
                expenses, savings, and financial goals
                in one simple platform.

                Track your progress, build better habits,
                and achieve your dreams smarter.

            </p>

            <div class="mt-5 d-flex justify-content-center">

                <a href="/login" class="hero-btn">
                    Get Started
                </a>

            </div>

        </div>

        <div class="col-lg-6 text-center">

            <div class="glass-card">

                <img src="https://getpennies.com/wp-content/uploads/2025/08/daily-expense-tracker-app-guide.jpeg"
                     class="hero-image">

            </div>

        </div>

    </div>

</div>

{{-- FEATURES --}}
<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="section-title">
            Features & Services
        </h1>

        <p class="section-desc">

            Everything you need to build
            smarter financial habits.

        </p>

    </div>

    <div class="row g-4">

        {{-- Goal Planning --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Goal Planning
                </h3>

                <p class="feature-desc mt-3">

                    Set saving goals for your dreams
                    and monitor your progress easily.

                </p>

            </div>

        </div>

        {{-- Budget --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/2830/2830284.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Budget Control
                </h3>

                <p class="feature-desc mt-3">

                    Organize your expenses and
                    keep your spending under control.

                </p>

            </div>

        </div>

        {{-- Analytics --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Spending Analytics
                </h3>

                <p class="feature-desc mt-3">

                    Understand your financial habits
                    through smart visual insights.

                </p>

            </div>

        </div>

    </div>

</div>

{{-- CTA SECTION --}}
<div class="container py-5 mb-5">

    <div class="glass-card text-center">

        <h1 class="section-title mb-4">
            Start Your Financial Journey Today
        </h1>

        <p class="section-desc mb-5">

            Manage smarter, save better,
            and achieve your real goals with SaveLy.

        </p>

        <a href="/register"
           class="hero-btn">

            Create Account

        </a>

    </div>

</div>
    
@endsection