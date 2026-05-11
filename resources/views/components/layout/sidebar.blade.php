<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveLy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   
    <style>
        .sidebar-custom{
            width: 500px;
            min-height: 100vh;
            background-color: #A96CFF;
        }

        .nav-pills .nav-link.active{
            background-color: white !important;
            color: #A96CFF !important;
            font-weight: bold;
        }

        .nav-pills .nav-link:hover{
            background-color: rgba(255,255,255,0.2);
        }
        hr{
            border-color: rgba(255,255,255,0.5);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar-custom">
    
        <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <span class="fs-1 fw-bold">SaveLy</span>
        </a>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item mb-2">
                <a href="/dashboard" class="nav-link text-white fs-2 {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="mb-2">
                <a href="/expense" class="nav-link text-white fs-2 {{ Request::is('expense') ? 'active' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i>
                    Expense
                </a>
            </li>

            <li class="mb-2">
                <a href="/saving" class="nav-link text-white fs-2 {{ Request::is('saving*') || Request::is('goalsave') || Request::is('daily') ? 'active' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i>
                    Saving
                </a>
            </li>
            
            <li class="mb-2">
                <a href="/goals" class="nav-link text-white fs-2 {{ Request::is('goals') ? 'active' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i>
                    Goals
                </a>
            </li>

            <li class="mb-2">
                <a href="/challenges" class="nav-link text-white fs-2 {{ Request::is('challenges') ? 'active' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i>
                    Challenges
                </a>
            </li>

            <li class="mb-2">
                <a href="/history" class="nav-link text-white fs-2 {{ Request::is('history') ? 'active' : '' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    History
                </a>
            </li>
        </ul>
        <hr>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://github.com/mdo.png" alt="" width="40" height="40" class="rounded-circle me-3">
                <strong>User</strong>
            </a>

            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</div>
</body>
