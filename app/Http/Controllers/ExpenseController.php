<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Expense;
use App\Models\Budget;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->get();

        $highestCategory = Expense::where(
            'user_id',
            Auth::id()
        )
        ->select('category')
        ->selectRaw('SUM(amount) as total')
        ->groupBy('category')
        ->orderByDesc('total')
        ->first();

        return view(
            'expense.index',
            compact(
                'expenses',
                'highestCategory'
            )
        );
    }

    public function create()
    {
        $budgets = Budget::where(
            'user_id',
            Auth::id()
        )->get();

        return view(
            'expense.create',
            compact('budgets')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'category' =>
                'required|string|max:255',

            'description' =>
                'nullable|string',

            'date' =>
                'required|date',

            'amount' =>
                'required|numeric|min:1',

            'purpose' =>
                'nullable|string',

            'budget_id' =>
                'nullable|exists:budgets,id'

        ]);

        if ($request->budget_id) {

            $budget = Budget::where(
                'user_id',
                Auth::id()
            )
            ->findOrFail(
                $request->budget_id
            );

            $budget->spent +=
                $request->amount;

            $budget->save();
        }

        Expense::create([

            'user_id' =>
                Auth::id(),

            'budget_id' =>
                $request->budget_id,

            'category' =>
                $request->category,

            'amount' =>
                $request->amount,

            'date' =>
                $request->date,

            'description' =>
                $request->description,

            'purpose' =>
                $request->purpose

        ]);

        return redirect()
            ->route('expense.index')
            ->with(
                'success',
                'Expense added successfully'
            );
    }

    public function edit($id)
    {
        $expense = Expense::where(
            'user_id',
            Auth::id()
        )
        ->findOrFail($id);

        $budgets = Budget::where(
            'user_id',
            Auth::id()
        )->get();

        return view(
            'expense.edit',
            compact(
                'expense',
                'budgets'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $expense = Expense::where(
            'user_id',
            Auth::id()
        )
        ->findOrFail($id);

        $validated = $request->validate([

            'category' =>
                'required|string|max:255',

            'description' =>
                'nullable|string',

            'date' =>
                'required|date',

            'amount' =>
                'required|numeric|min:1',

            'purpose' =>
                'nullable|string',

            'budget_id' =>
                'nullable|exists:budgets,id'

        ]);

        if ($expense->budget_id) {

            $oldBudget = Budget::where(
                'user_id',
                Auth::id()
            )
            ->find($expense->budget_id);

            if ($oldBudget) {

                $oldBudget->spent -=
                    $expense->amount;

                if ($oldBudget->spent < 0) {

                    $oldBudget->spent = 0;
                }

                $oldBudget->save();
            }
        }

        if ($request->budget_id) {

            $newBudget = Budget::where(
                'user_id',
                Auth::id()
            )
            ->findOrFail(
                $request->budget_id
            );

            $newBudget->spent +=
                $request->amount;

            $newBudget->save();
        }

        $expense->update([

            'budget_id' =>
                $request->budget_id,

            'category' =>
                $request->category,

            'amount' =>
                $request->amount,

            'date' =>
                $request->date,

            'description' =>
                $request->description,

            'purpose' =>
                $request->purpose

        ]);

        return redirect()
            ->route('expense.index')
            ->with(
                'success',
                'Expense updated successfully'
            );
    }

    public function destroy($id)
    {
        $expense = Expense::where(
            'user_id',
            Auth::id()
        )
        ->findOrFail($id);

        if ($expense->budget_id) {

            $budget = Budget::where(
                'user_id',
                Auth::id()
            )
            ->find($expense->budget_id);

            if ($budget) {

                $budget->spent -=
                    $expense->amount;

                if ($budget->spent < 0) {

                    $budget->spent = 0;
                }

                $budget->save();
            }
        }

        $expense->delete();

        return redirect()
            ->route('expense.index')
            ->with(
                'success',
                'Expense deleted successfully'
            );
    }
}