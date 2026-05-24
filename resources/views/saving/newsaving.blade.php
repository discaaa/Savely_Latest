@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .saving-card{
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

    .outline-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        background: white;
        border-radius: 16px;
        padding: 12px 28px;
        font-weight: 700;
        transition: 0.3s;
        text-decoration: none;
    }

    .outline-btn:hover{
        background: #f3e8ff;
        color: #6f2cff;
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

    .saving-icon{
        width: 120px;
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

</style>

<div class="container py-4">

    <div class="mb-4">

        <h2 class="section-title mb-1">
            Add New Saving
        </h2>

        <p class="section-subtitle mb-0">
            Record and manage your saving transactions
        </p>

    </div>

    <div class="saving-card">

        <div class="text-center mb-5">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                 class="saving-icon mb-3">

            <h5 class="fw-bold text-primary">
                Record Your Saving
            </h5>

        </div>

        <form action="{{ route('saving.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="form-label">
                    Saving Goal
                </label>

                <select name="goal_id"
                        class="form-select"
                        required>

                    <option value="">
                        Choose Your Goal
                    </option>

                    @foreach($goals as $goal)

                        <option value="{{ $goal->id }}">

                            {{ $goal->title }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Amount
                </label>

                <input type="number"
                       name="amount"
                       class="form-control"
                       placeholder="Rp 0"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Saving Date
                </label>

                <input type="date"
                       name="saving_date"
                       class="form-control"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Saving Method
                </label>

                <select name="method"
                        class="form-select"
                        required>

                    <option value="Cash">
                        Cash
                    </option>

                    <option value="Bank Transfer">
                        Bank Transfer
                    </option>

                    <option value="E-Wallet">
                        E-Wallet
                    </option>

                </select>

            </div>

            <div class="mb-5">

                <label class="form-label">
                    Notes
                </label>

                <textarea name="note"
                          class="form-control"
                          rows="5"
                          placeholder="Write additional notes..."></textarea>

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <a href="{{ route('saving.daily') }}"
                   class="cancel-btn">

                    Cancel

                </a>

                <button type="submit"
                        class="purple-btn">

                    Add Saving

                </button>

            </div>

        </form>

    </div>

</div>

@endsection