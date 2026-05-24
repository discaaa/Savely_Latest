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

    .about-section{
        padding: 80px 90px;
    }

    .hero-title{
        font-size: 65px;
        font-weight: 900;
        color: #4c1d95;
        line-height: 1.2;
    }

    .hero-desc{
        font-size: 21px;
        color: #5b21b6;
        line-height: 1.9;
        margin-top: 25px;
    }

    .glass-card{
        background: rgba(255,255,255,0.35);
        backdrop-filter: blur(12px);
        border-radius: 35px;
        padding: 45px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        border: 2px solid rgba(255,255,255,0.25);
    }

    .hero-image{
        width: 100%;
        max-width: 550px;
        border-radius: 50%;
        background: #d8b4fe;
        padding: 6px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes floating{

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

    .section-title{
        font-size: 52px;
        font-weight: 900;
        color: #4c1d95;
        margin-bottom: 20px;
    }

    .section-desc{
        color: #5b21b6;
        font-size: 20px;
        line-height: 1.9;
    }

    .mission-card{
        background: rgba(255,255,255,0.4);
        backdrop-filter: blur(10px);
        border-radius: 28px;
        padding: 35px;
        height: 100%;
        transition: 0.3s;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .mission-card:hover{
        transform: translateY(-8px);
    }

    .mission-icon{
        width: 90px;
        margin-bottom: 25px;
    }

    .mission-title{
        font-size: 28px;
        font-weight: bold;
        color: #5b21b6;
    }

    .mission-desc{
        color: #4b5563;
        line-height: 1.8;
        margin-top: 15px;
    }

    .team-card{
        background: rgba(255,255,255,0.35);
        border-radius: 28px;
        padding: 35px;
        text-align: center;
        transition: 0.3s;
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .team-card:hover{
        transform: translateY(-10px);
    }

    .team-img{
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid white;
        margin-bottom: 20px;
    }

    .team-name{
        font-size: 24px;
        font-weight: bold;
        color: #5b21b6;
    }

    .team-role{
        color: #6b7280;
        font-size: 16px;
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

<div class="container-fluid about-section">

    {{-- HERO --}}
    <div class="row align-items-center mb-5">

        <div class="col-lg-6">

            <h1 class="hero-title">

                About <br>
                SaveLy

            </h1>

            <p class="hero-desc">

                SaveLy is a smart financial management platform
                designed to help users build better saving habits,
                manage expenses, and achieve personal financial goals.

                We believe financial freedom starts from small,
                consistent actions every day.

            </p>

            <div class="mt-5">

                <a href="/login"
                   class="purple-btn">

                    Start Your Journey

                </a>

            </div>

        </div>

        <div class="col-lg-6 text-center">

            <div class="glass-card">

                <img src="https://static.vecteezy.com/system/resources/previews/034/892/685/non_2x/illustration-graphic-cartoon-character-of-budget-vector.jpg"
                     class="hero-image">

            </div>

        </div>

    </div>

    {{-- OUR MISSION --}}
    <div class="mt-5 mb-5 text-center">

        <h1 class="section-title">
            Our Mission
        </h1>

        <p class="section-desc">

            Helping people create healthier financial habits
            through simple, modern, and motivating tools.

        </p>

    </div>

    <div class="row g-4 mb-5">

        {{-- Mission 1 --}}
        <div class="col-lg-4">

            <div class="mission-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png"
                     class="mission-icon">

                <h3 class="mission-title">
                    Financial Goals
                </h3>

                <p class="mission-desc">

                    Encourage users to achieve their dreams
                    through structured and trackable saving goals.

                </p>

            </div>

        </div>

        {{-- Mission 2 --}}
        <div class="col-lg-4">

            <div class="mission-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/2910/2910791.png"
                     class="mission-icon">

                <h3 class="mission-title">
                    Motivation
                </h3>

                <p class="mission-desc">

                    Keep users motivated with saving challenges,
                    progress tracking, and achievement systems.

                </p>

            </div>

        </div>

        {{-- Mission 3 --}}
        <div class="col-lg-4">

            <div class="mission-card text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png"
                     class="mission-icon">

                <h3 class="mission-title">
                    Smart Analytics
                </h3>

                <p class="mission-desc">

                    Provide financial insights and spending
                    analytics to support smarter decisions.

                </p>

            </div>

        </div>

    </div>

    {{-- Teams --}}
    <div class="text-center mt-5 mb-5">

        <h1 class="section-title">
            Meet Our Team
        </h1>

        <p class="section-desc">

            The people behind SaveLy who aim to make
            personal finance easier and more enjoyable.

        </p>

    </div>

    <div class="row g-4">

        {{-- Team 1 --}}
        <div class="col-lg-4">

            <div class="team-card">

                <img src="https://stbm7resourcesprod.blob.core.windows.net/profilepicture/149390ff-2f5b-4a87-8082-27bcd7d30470.jpg"
                     class="team-img">

                <h4 class="team-name">
                    Adisca Gandawidjaja
                </h4>

                <p class="team-role">
                    Frontend and Backend Developer
                </p>

            </div>

        </div>

        {{-- Team 2 --}}
        <div class="col-lg-4">

            <div class="team-card">

                <img src="https://stbm7resourcesprod.blob.core.windows.net/profilepicture/23816dfb-7754-4154-827d-91051dcd82d8.jpg"
                     class="team-img">

                <h4 class="team-name">
                    Alicia Angelina Jusup
                </h4>

                <p class="team-role">
                    Frontend Developer
                </p>

            </div>

        </div>

        {{-- Team 3 --}}
        <div class="col-lg-4">

            <div class="team-card">

                <img src="https://stbm7resourcesprod.blob.core.windows.net/profilepicture/17c9feb4-7c77-45c2-a66f-98ed6b8408b2.jpg"
                     class="team-img">

                <h4 class="team-name">
                    Jolin Takeshia
                </h4>

                <p class="team-role">
                    Frontend and Backend Developer
                </p>

            </div>

        </div>

    </div>

    <div class="row g-4 mt-2 justify-content-center">

        {{-- Team 4 --}}
        <div class="col-lg-4">

            <div class="team-card">

                <img src="https://stbm7resourcesprod.blob.core.windows.net/profilepicture/165064bc-9a6b-4826-8fb0-ecbf08704af7.jpg"
                    class="team-img">

                <h4 class="team-name">
                    Ivan Novanto Bastian
                </h4>

                <p class="team-role">
                    Database and Backend Developer
                </p>

            </div>

        </div>

            <div class="col-lg-4">

        <div class="team-card">

            <img src="https://stbm7resourcesprod.blob.core.windows.net/profilepicture/ee39594b-9e92-485b-9633-4368bec30325.jpg"
                 class="team-img">

            <h4 class="team-name">
                Howard James Winatra
            </h4>

            <p class="team-role">
                Backend Developer
            </p>

        </div>

    </div>

</div>

@endsection