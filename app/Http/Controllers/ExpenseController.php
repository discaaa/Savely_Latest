<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
   public function index()
{
    $expenses = Expense::latest()->get();

    $highestCategory = Expense::select('category')
        ->selectRaw('SUM(amount) as total')
        ->groupBy('category')
        ->orderByDesc('total')
        ->first();

    return view('expense.index', compact('expenses', 'highestCategory'));
}
    
    public function create()
    {
        return view('expense.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'purpose' => 'nullable|string'
        ]);

        Expense::create($validated);

        return redirect()->route('expense.index')
            ->with('success', 'Expense added successfully');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        return view('expense.edit', compact('expense'));
    }

    public function update(Request $request, $id)
{
    $expense = Expense::findOrFail($id);

    $expense->amount = $request->amount;
    $expense->category = $request->category;
    $expense->date = $request->date;
    $expense->description = $request->description;
    $expense->purpose = $request->purpose;

    $expense->save();

    return redirect()->route('expense.index')
        ->with('success', 'updated');
}

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);

        $expense->delete();

        return redirect()->route('expense.index')
            ->with('success', 'Expense deleted successfully');
    }
}