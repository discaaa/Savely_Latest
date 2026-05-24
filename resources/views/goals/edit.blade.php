@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .edit-card{
        background: white;
        border-radius: 30px;
        padding: 40px;
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
        border-radius: 16px;
        padding: 14px 28px;
        font-weight: bold;
    }

    .goal-img{
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #ede9fe;
        padding: 6px;
        background: white;
    }

    .upload-text{
        color: #6f2cff;
        font-weight: 700;
    }

</style>

<div class="container py-4">

    <div class="mb-4">

        <h2 class="page-title">
            Edit Goal
        </h2>

        <p class="page-subtitle">
            Update your financial goal details
        </p>

    </div>

    <div class="edit-card">

        <div class="text-center mb-5">

            @if($goal->image)

                <img src="{{ asset('storage/' . $goal->image) }}"
                     class="goal-img">

            @else

                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                     class="goal-img">

            @endif

            <p class="upload-text mt-3">
                Change Goal Image
            </p>

        </div>

        <form action="{{ route('goals.update', $goal->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">
                    Goal Name
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $goal->title }}"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Target Amount
                </label>

                <input type="number"
                       name="target_amount"
                       class="form-control"
                       value="{{ $goal->target_amount }}"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Current Amount
                </label>

                <input type="number"
                       name="current_amount"
                       class="form-control"
                       value="{{ $goal->current_amount }}"
                       required>

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
                    Status
                </label>

                <select name="status"
                        class="form-select">

                    <option value="ongoing"
                        {{ $goal->status == 'ongoing' ? 'selected' : '' }}>

                        Ongoing

                    </option>

                    <option value="completed"
                        {{ $goal->status == 'completed' ? 'selected' : '' }}>

                        Completed

                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Goal Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="5">{{ $goal->description }}</textarea>

            </div>

            <div class="d-flex justify-content-between mt-5">

                <button type="button"
                        class="btn btn-outline-danger delete-btn"
                        onclick="document.getElementById('delete-form').submit();">

                    Delete Goal

                </button>

                <button type="submit"
                        class="purple-btn">

                    Update Goal

                </button>

            </div>

        </form>

        <form id="delete-form"
              action="{{ route('goals.destroy', $goal->id) }}"
              method="POST"
              class="d-none">

            @csrf
            @method('DELETE')

        </form>

    </div>

</div>

@endsection