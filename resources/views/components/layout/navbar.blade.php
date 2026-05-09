<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-custom{
            background-color: #A96CFF;
        }

        .navbar-custom .nav-link{
            color: white;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover{
            color: #f3e8ff;
        }

        .navbar-custom .nav-link.active{
            font-weight: bold;
            border-bottom: 3px solid white;
        }
    </style>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom px-4">

    <!-- Brand -->
    <a class="navbar-brand fw-bold text-white" href="#">
        SaveLy
    </a>

    <!-- Toggle Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarContent">

        <!-- Left Menu -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- nnti insert logo savely -->
            <li class="nav-item">
                <a class="nav-link active" href="/features">
                    Features
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/aboutus">
                    About Us
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/faq">
                    FAQ
                </a>
            </li>
        </ul>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">
            <li class="nav-item">
                <a class="nav-link" href="/getstarted">
                    Get Started
                </a>
            </li>

        </div>

    </div>

</nav>