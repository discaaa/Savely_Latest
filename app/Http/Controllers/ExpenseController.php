<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    // GET ALL EXPENSES
    public function index()
    {
        return response()->json(
            Expense::latest()->get()
        );
    }

    // STORE EXPENSE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'purpose' => 'nullable|string'
        ]);

        $expense = Expense::create($validated);

        return response()->json([
            'message' => 'Expense created successfully',
            'data' => $expense
        ], 201);
    }
}