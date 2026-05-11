<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SaveLy</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background:#f3f4f6;
}

/* MAIN */
.main{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar{
    width:260px;

    background:linear-gradient(
        180deg,
        #b266ff,
        #8b5cf6
    );

    padding:30px 20px;

    color:white;

    position:sticky;
    top:0;

    height:100vh;
}

.logo{
    font-size:38px;
    font-weight:700;

    margin-bottom:50px;
}

.menu{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.menu a{
    text-decoration:none;

    color:white;

    padding:15px 18px;

    border-radius:14px;

    transition:0.25s;
}

.menu a:hover{
    background:rgba(255,255,255,0.15);
}

.active{
    background:white;
    color:#8b5cf6 !important;
    font-weight:bold;
}

/* CONTENT */
.content{
    flex:1;

    padding:30px;
}

/* MOBILE */
@media(max-width:768px){

    .main{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
        height:auto;
        position:relative;
    }

}

</style>

</head>

<body>

<div class="main">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            SaveLy
        </div>

        <div class="menu">

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                Dashboard
            </a>

            <a
                href="{{ route('expense.index') }}"
                class="{{ request()->routeIs('expense.index') ? 'active' : '' }}"
            >
                Expense
            </a>

            <a
                href="{{ route('saving') }}"
                class="{{ request()->routeIs('saving') ? 'active' : '' }}"
            >
                Saving
            </a>

            <a
                href="{{ route('goals') }}"
                class="{{ request()->routeIs('goals') ? 'active' : '' }}"
            >
                Goals
            </a>

            <a
                href="{{ route('challenges.index') }}"
                class="{{ request()->routeIs('challenges.index') ? 'active' : '' }}"
            >
                Challenges
            </a>

            <a
                href="{{ route('history.index') }}"
                class="{{ request()->routeIs('history.index') ? 'active' : '' }}"
            >
                History
            </a>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        @yield('content')

    </div>

</div>

</body>
</html>