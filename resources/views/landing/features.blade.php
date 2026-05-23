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

    .features-section{
        padding: 70px 80px;
    }

    .main-title{
        font-size: 60px;
        font-weight: 900;
        color: #4c1d95;
    }

    .main-desc{
        font-size: 22px;
        color: #5b21b6;
        max-width: 750px;
        margin: auto;
        line-height: 1.8;
    }

    .feature-card{
        background: rgba(255,255,255,0.45);
        backdrop-filter: blur(10px);
        border-radius: 30px;
        padding: 35px;
        height: 100%;
        transition: 0.35s;
        border: 2px solid rgba(255,255,255,0.3);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .feature-card:hover{
        transform: translateY(-10px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.15);
    }

    .feature-icon{
        width: 90px;
        height: 90px;
        object-fit: contain;
        margin-bottom: 25px;
    }

    .feature-title{
        font-size: 28px;
        font-weight: bold;
        color: #5b21b6;
        margin-bottom: 18px;
    }

    .feature-desc{
        color: #4b5563;
        line-height: 1.8;
        font-size: 17px;
    }

    .highlight-section{
        margin-top: 100px;
    }

    .highlight-card{
        background: rgba(255,255,255,0.35);
        border-radius: 35px;
        padding: 50px;
        backdrop-filter: blur(12px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .highlight-title{
        font-size: 48px;
        font-weight: 900;
        color: #4c1d95;
    }

    .highlight-desc{
        font-size: 20px;
        color: #5b21b6;
        line-height: 1.9;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 18px;
        padding: 15px 35px;
        font-size: 18px;
        font-weight: bold;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 8px 20px rgba(111,44,255,0.25);
    }

    .purple-btn:hover{
        background: #5b21b6;
        transform: translateY(-3px);
        color: white;
    }

</style>

<div class="container-fluid features-section">

    {{-- TITLE --}}
    <div class="text-center mb-5">

        <h1 class="main-title">
            Features & Services
        </h1>

        <p class="main-desc mt-4">

            SaveLy provides powerful tools to help you
            manage your money smarter, track your savings,
            and achieve your financial goals with confidence.

        </p>

    </div>

    {{-- FEATURES --}}
    <div class="row g-4">

        {{-- Goal Planning --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Goal Planning
                </h3>

                <p class="feature-desc">

                    Create personal saving goals for your dreams,
                    whether it’s a new gadget, vacation, education,
                    or future investment.

                </p>

            </div>

        </div>

        {{-- Budget Control --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/2830/2830284.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Budget Control
                </h3>

                <p class="feature-desc">

                    Organize your spending efficiently and maintain
                    healthy financial habits with easy budget tracking.

                </p>

            </div>

        </div>

        {{-- Spending Analysis --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Spending Analysis
                </h3>

                <p class="feature-desc">

                    Visualize your income and expenses through
                    detailed analytics and financial insights.

                </p>

            </div>

        </div>

        {{-- Daily Saving --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/2489/2489756.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Daily Saving
                </h3>

                <p class="feature-desc">

                    Build consistent saving habits by recording
                    your daily savings progress automatically.

                </p>

            </div>

        </div>

        {{-- Saving History --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/3500/3500833.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Saving History
                </h3>

                <p class="feature-desc">

                    Monitor all your saving activities and
                    transaction records in one organized place.

                </p>

            </div>

        </div>

        {{-- Challenges --}}
        <div class="col-lg-4">

            <div class="feature-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/2910/2910791.png"
                     class="feature-icon">

                <h3 class="feature-title">
                    Saving Challenges
                </h3>

                <p class="feature-desc">

                    Stay motivated with fun saving challenges
                    designed to improve your financial discipline.

                </p>

            </div>

        </div>

    </div>

    {{-- HIGHLIGHT --}}
    <div class="highlight-section">

        <div class="highlight-card">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1 class="highlight-title">

                        Manage Smarter,
                        Live Better.

                    </h1>

                    <p class="highlight-desc mt-4">

                        SaveLy is designed to simplify financial
                        management for students, workers, and anyone
                        who wants to build healthier money habits.

                        Start planning your future today.

                    </p>

                    <div class="mt-5">

                        <a href="/login"
                           class="purple-btn">

                            Start Saving Now

                        </a>

                    </div>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                         width="420">

                </div>

            </div>

        </div>

    </div>

</div>

@endsection