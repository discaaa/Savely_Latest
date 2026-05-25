<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveLy</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   
    <style>
        .sidebar-custom{
            width: 250px;
            background-color: #A96CFF;
            min-height: 100vh;
        }
        
        .wrapper{
            display: flex;
            min-height: 100vh;
            align-items: stretch;
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
            border-color: rgba(255,255,255,0,1);
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar-custom">
    
        <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <img src="https://thumbs.dreamstime.com/b/vibrant-purple-d-wallet-depicted-partially-open-green-banknote-peeking-out-top-represents-financial-415032352.jpg"
                 width="60"
                 class="rounded-circle bg-white p-2 shadow">
            <span class="fs-1 fw-bold ms-3">SaveLy</span>
        </a>

        <hr>
        
        <ul class="nav nav-pills flex-column gap-0">

            <li class="nav-item mb-1">
                <a href="/dashboard" class="nav-link text-white fs-5 {{ Request::is('dashboard') ? 'active' : '' }}">
                    <img src="https://img.pikbest.com/origin/10/13/30/96rpIkbEsTZQz.jpg!sw800"
                        width="35"
                        class="rounded-circle">
                    <i class="bi bi-house-door me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="mb-1">
                <a href="/expense" class="nav-link text-white fs-5 {{ Request::is('expense') || Request::is('expense/index') || Request::is('expense/create') || Request::is('expense/edit/*') ? 'active' : '' }}">
                    <img src="https://img.freepik.com/premium-vector/colored-expense-icon_781202-4250.jpg"
                        width="35"
                        class="rounded-circle">
                    <i class="bi bi-wallet2 me-2"></i>
                    Expense
                </a>
            </li>

            <li class="mb-1">
                <a href="/budget" class="nav-link text-white fs-5 {{ Request::is('budget') || Request::is('budget/index') || Request::is('budget/create') || Request::is('budget/detail/*') || Request::is('budget/edit/*') || Request::is('budget/historybudget/*') ? 'active' : '' }}">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/011/079/483/small/budget-plan-icons-illustration-budget-plan-symbol-for-seo-website-and-mobile-apps-vector.jpg"
                        width="35"
                        class="rounded-circle">
                    <i class="bi bi-wallet2 me-2"></i>
                    Budget
                </a>
            </li>

            <li class="mb-1">
                <a href="/saving" class="nav-link text-white fs-5 {{ Request::is('saving*') || Request::is('goalsave') || Request::is('daily') || Request::is('saving/newsaving') || Request::is('saving/detail/*') || Request::is('saving/edit/*') || Request::is('/saving/histortsaving/*') ? 'active' : '' }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/8079/8079154.png"
                        width="35"
                        class="rounded-circle" style="background: white">
                    <i class="bi bi-wallet2 me-2"></i>
                    Saving
                </a>
            </li>
            
            <li class="mb-1">
                <a href="/goals" class="nav-link text-white fs-5 {{ Request::is('goals') || Request::is('goals/index') || Request::is('goals/create') || Request::is('goals/detail/*') || Request::is('goals/edit/*') || Request::is('goals/historygoals/*') ? 'active' : '' }}">
                    <img src="https://thumbs.dreamstime.com/b/target-goal-icon-trendy-vector-flat-illustration-isolated-white-background-327427002.jpg"
                        width="35"
                        class="rounded-circle">
                    <i class="bi bi-wallet2 me-2"></i>
                    Goals
                </a>
            </li>

            <li class="mb-1">
                <a href="/challenges" class="nav-link text-white fs-5 {{ Request::is('challenges') ? 'active' : '' }}">
                    <img src="https://static.vecteezy.com/ti/vetor-gratis/t2/27373228-criativamente-projetado-plano-icone-do-trofeu-dentro-editavel-estilo-realizacao-trofeu-projeto-vetor.jpg"
                        width="35"
                        class="rounded-circle">
                    <i class="bi bi-wallet2 me-2"></i>
                    Challenges
                </a>
            </li>

            <li class="mb-1">
                <a href="/history" class="nav-link text-white fs-5 {{ Request::is('history') ? 'active' : '' }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/7554/7554873.png"
                        width="35"
                        class="rounded-circle" style="background: white">
                    <i class="bi bi-clock-history me-2"></i>
                    History
                </a>
            </li>
        </ul>
    <hr>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto d-flex justify-content-center">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
    
    </div>
        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            {{-- Notif ijo --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show mx-4 mt-4"
                    role="alert">

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

            @if(session('warning'))

                <div class="alert alert-warning alert-dismissible fade show mx-4 mt-4"
                    role="alert">

                    {{ session('warning') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>