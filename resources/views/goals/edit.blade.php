@extends('components.layout.sidebar')

@section('content')

<style>

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 25px;
        font-weight: bold;
    }

    .goal-img{
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

</style>

<div class="container py-4">

    <x-ui.card.default>

        <div class="d-flex justify-content-between mb-4">

            <h2 class="fw-bold">
                Edit Goal
            </h2>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50">

        </div>

        {{-- Current Image --}}
        <div class="text-center mb-4">

            @if($goal->image)

                <img src="{{ asset('storage/' . $goal->image) }}"
                     class="goal-img rounded-circle">

            @else

                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                     class="goal-img">

            @endif

            <p class="text-primary fw-bold mt-3">
                Change Image
            </p>

        </div>

        <form action="{{ route('goals.update', $goal->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Goal Name --}}
            <div class="mb-3">

                <label class="form-label">
                    Goal Name
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $goal->title }}"
                       required>

            </div>

            {{-- Target Amount --}}
            <div class="mb-3">

                <label class="form-label">
                    Target Amount
                </label>

                <input type="number"
                       name="target_amount"
                       class="form-control"
                       value="{{ $goal->target_amount }}"
                       required>

            </div>

            {{-- Current Amount --}}
            <div class="mb-3">

                <label class="form-label">
                    Current Amount
                </label>

                <input type="number"
                       name="current_amount"
                       class="form-control"
                       value="{{ $goal->current_amount }}"
                       required>

            </div>

            {{-- Target Date --}}
            <div class="mb-3">

                <label class="form-label">
                    Target Date
                </label>

                <input type="date"
                       name="target_date"
                       class="form-control"
                       value="{{ $goal->target_date }}">

            </div>

            {{-- Status --}}
            <div class="mb-3">

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

            {{-- Upload Image --}}
            <div class="mb-3">

                <label class="form-label">
                    Goal Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            {{-- Description --}}
            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="5">{{ $goal->description }}</textarea>

            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">

                {{-- Delete --}}
                <form action="{{ route('goals.destroy', $goal->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-outline-danger">

                        Delete Goal

                    </button>

                </form>

                {{-- Update --}}
                <button type="submit"
                        class="purple-btn">

                    Update Goal

                </button>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection