@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .goal-card{
        background: white;
        border-radius: 28px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .page-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .page-subtitle{
        color: #6b7280;
    }

    .goal-icon{
        width: 120px;
        height: 120px;
        object-fit: contain;
        animation: floatAnim 4s ease-in-out infinite;
    }

    @keyframes floatAnim{

        0%{
            transform: translateY(0px);
        }

        50%{
            transform: translateY(-10px);
        }

        100%{
            transform: translateY(0px);
        }

    }

    .form-label{
        font-weight: 700;
        color: #374151;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select{
        border-radius: 16px;
        padding: 14px 18px;
        border: 1px solid #ddd6fe;
        background: #fafaff;
    }

    .form-control:focus,
    .form-select:focus{
        border-color: #6f2cff;
        box-shadow: 0 0 0 0.2rem rgba(111,44,255,0.12);
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 16px;
        padding: 12px 28px;
        font-weight: bold;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.18);
    }

    .purple-btn:hover{
        background: #5b21b6;
        transform: translateY(-2px);
    }

    .cancel-btn{
        background: #ede9fe;
        color: #6f2cff;
        padding: 14px 28px;
        border-radius: 16px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }

    .cancel-btn:hover{
        background: #ddd6fe;
        color: #5b21b6;
    }

    .error-box{
        border-radius: 18px;
        border: none;
    }

</style>

<div class="container py-4">

    <div class="mb-4">

        <h2 class="page-title">
            Create New Goal
        </h2>

        <p class="page-subtitle mb-0">
            Start planning your future and achieve your dream goals.
        </p>

    </div>

    <div class="goal-card">

        <div class="text-center mb-4">

            <img src="https://cdn-icons-png.flaticon.com/512/1829/1829586.png"
                 class="goal-icon">

            <h5 class="fw-bold text-primary mt-3">
                Create Your Saving Goal
            </h5>

        </div>

        @if ($errors->any())

            <div class="alert alert-danger error-box mb-4">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('goals.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Goal Name
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Example : New Laptop"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Target Amount
                    </label>

                    <input type="number"
                           name="target_amount"
                           class="form-control"
                           placeholder="Rp 0"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Initial Saving
                    </label>

                    <input type="number"
                           name="current_amount"
                           class="form-control"
                           placeholder="Rp 0">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="ongoing">
                            Ongoing
                        </option>

                        <option value="completed">
                            Completed
                        </option>

                    </select>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="5"
                          placeholder="Write your goal description here..."></textarea>

            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">

                <a href="{{ route('goals.index') }}"
                   class="btn btn-outline-secondary cancel-btn">

                    Cancel

                </a>

                <button type="submit"
                        class="purple-btn">

                    Create Goal

                </button>

            </div>

        </form>

    </div>

</div>

@endsection