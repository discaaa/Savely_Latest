@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .page-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .page-subtitle{
        color: #6b7280;
    }

    .expense-form-card{
        background: white;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
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

    .save-btn{
        background: #6f2cff;
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 16px;
        font-weight: bold;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.2);
    }

    .save-btn:hover{
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

    .expense-icon{
        width: 80px;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title">
                Edit Expense
            </h2>

            <p class="page-subtitle">
                Update and manage your expense data
            </p>

        </div>

        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331941.png"
             class="expense-icon">

    </div>

    <div class="expense-form-card">

        <form action="{{ route('expense.update', $expense->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            {{-- Amount --}}
            <div class="mb-4">

                <label class="form-label">
                    Amount
                </label>

                <input type="number"
                       name="amount"
                       class="form-control"
                       value="{{ $expense->amount }}">

            </div>

            {{-- Category --}}
            <div class="mb-4">

                <label class="form-label">
                    Category
                </label>

                <select name="category"
                        class="form-select">

                    <option value="Food"
                        {{ $expense->category == 'Food' ? 'selected' : '' }}>

                        Food

                    </option>

                    <option value="Transport"
                        {{ $expense->category == 'Transport' ? 'selected' : '' }}>

                        Transport

                    </option>

                    <option value="Shopping"
                        {{ $expense->category == 'Shopping' ? 'selected' : '' }}>

                        Shopping

                    </option>

                    <option value="Bills"
                        {{ $expense->category == 'Bills' ? 'selected' : '' }}>

                        Bills

                    </option>

                    <option value="Entertainment"
                        {{ $expense->category == 'Entertainment' ? 'selected' : '' }}>

                        Entertainment

                    </option>

                </select>

            </div>

            {{-- Date --}}
            <div class="mb-4">

                <label class="form-label">
                    Date
                </label>

                <input type="date"
                       name="date"
                       class="form-control"
                       value="{{ $expense->date }}">

            </div>

            {{-- Description --}}
            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea class="form-control"
                          name="description"
                          rows="4"
                          placeholder="Add short description">{{ $expense->description }}</textarea>

            </div>

            {{-- Purpose --}}
            <div class="mb-5">

                <label class="form-label">
                    Purpose
                </label>

                <textarea class="form-control"
                          name="purpose"
                          rows="4"
                          placeholder="Why did you spend this money?">{{ $expense->purpose }}</textarea>

            </div>

            <div class="d-flex gap-3 justify-content-between">

                <a href="{{ route('expense.index') }}"
                   class="cancel-btn">

                    Cancel

                </a>

                <button type="submit"
                        class="save-btn">

                    Update Expense

                </button>

            </div>

        </form>

    </div>

</div>

@endsection