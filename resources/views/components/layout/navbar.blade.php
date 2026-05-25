<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SaveLy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom{
            background: rgba(169,108,255,0.92);
            backdrop-filter: blur(14px);
            padding: 16px 50px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .navbar-brand{
            font-size: 30px;
            font-weight: 900;
            color: white !important;
            display: flex;
            align-items: center;
        }

        .logo-img{
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 50%;
            background: white;
            padding: 6px;
            margin-right: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .navbar-nav{
            gap: 12px;
            margin-left: 40px;
        }

        .navbar-custom .nav-link{
            color: rgba(255,255,255,0.9);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 14px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-custom .nav-link:hover{
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateY(-2px);
        }

        .navbar-custom .nav-link.active{
            background: white;
            color: #6f2cff !important;
            font-weight: 700;
            box-shadow: 0 6px 14px rgba(0,0,0,0.08);
        }

        .navbar-toggler{
            border: none;
            background: rgba(255,255,255,0.2);
            padding: 8px 12px;
            border-radius: 12px;
        }

        .navbar-toggler:focus{
            box-shadow: none;
        }

        @media(max-width:991px){

            .navbar-nav{
                margin-left: 0;
                margin-top: 20px;
            }

        }

    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container-fluid">

            {{-- Logo --}}
            <a class="navbar-brand" href="/home">

                <img src="https://thumbs.dreamstime.com/b/vibrant-purple-d-wallet-depicted-partially-open-green-banknote-peeking-out-top-represents-financial-415032352.jpg"
                     class="logo-img">

                SaveLy

            </a>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            {{-- Navbar Content --}}
            <div class="collapse navbar-collapse"
                 id="navbarContent">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}"
                           href="/home">

                            Home

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->is('features') ? 'active' : '' }}"
                           href="/features">

                            Features

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->is('aboutus') ? 'active' : '' }}"
                           href="/aboutus">

                            About Us

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}"
                           href="/faq">

                            FAQ

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
        <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        {{-- Notif ijo --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show mx-4 mt-4" role="alert">

                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

            {{-- Notif error --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-4 mt-4"
                role="alert">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show mx-4 mt-4"
                role="alert">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>