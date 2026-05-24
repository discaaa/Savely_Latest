@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .goal-card{
        background: white;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .section-subtitle{
        color: #6b7280;
        font-size: 15px;
    }

    .goal-icon{
        width: 120px;
        height: 120px;
        object-fit: cover;
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

    .delete-btn{
        border: 2px solid #dc2626;
        color: #dc2626;
        background: white;
        border-radius: 16px;
        padding: 12px 28px;
        font-weight: 700;
        transition: 0.3s;
        text-decoration: none;
    }

    .delete-btn:hover{
        background: #fee2e2;
        color: #dc2626;
    }

</style>

<div class="container py-4">

    <div class="mb-4">

        <h2 class="section-title mb-1">
            Edit Goal
        </h2>

        <p class="section-subtitle mb-0">
            Update and manage your saving goal
        </p>

    </div>

    <div class="goal-card">

        <div class="text-center mb-5">

            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                 class="goal-icon mb-3">

            <h5 class="fw-bold text-primary">
                Update Your Goal
            </h5>

        </div>

        <form action="{{ route('goals.update', $goal->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">
                    Goal Name
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $goal->name }}">

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Target Amount
                </label>

                <input type="number"
                       name="target_amount"
                       class="form-control"
                       value="{{ $goal->target_amount }}">

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Target Date
                </label>

                <input type="date"
                       name="target_date"
                       class="form-control"
                       value="{{ $goal->target_date }}">

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Category
                </label>

                <select class="form-select"
                        name="category">

                    <option value="Electronics"
                        {{ $goal->category == 'Electronics' ? 'selected' : '' }}>

                        Electronics

                    </option>

                </select>

            </div>

            <div class="mb-5">

                <label class="form-label">
                    Description
                </label>

                <textarea class="form-control"
                          name="description"
                          rows="5">{{ $goal->description }}</textarea>

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <a href="{{ route('goals.delete', $goal->id) }}"
                   class="delete-btn">

                    Delete Goal

                </a>

                <button type="submit"
                        class="purple-btn">

                    Update Goal

                </button>

            </div>

        </form>

    </div>

</div>

@endsection