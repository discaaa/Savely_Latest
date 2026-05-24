<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use App\Models\Expense;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        $totalBudget =
            $budgets->sum('limit_amount');

        $totalSpent = 0;

        foreach($budgets as $budget){

            $budget->spent =
                $budget->expenses->sum('amount');

            $budget->remaining =
                $budget->limit_amount - $budget->spent;

            $budget->percentage =
                $budget->limit_amount > 0

                ? min(
                    100,
                    round(
                        ($budget->spent / $budget->limit_amount) * 100
                    )
                )

                : 0;
            $totalSpent += $budget->spent;
        }
        $remainingBudget =
            $totalBudget - $totalSpent;

        $overallPercentage = $totalBudget > 0 ? round(($totalSpent/$totalBudget) * 100) : 0;

        return view(
            'budget.index',
            compact(
                'budgets',
                'totalBudget',
                'totalSpent',
                'remainingBudget',
                'overallPercentage'
            )
        );
    }

    public function create()
    {
        return view('budget.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'budget_name' =>
                'required|string|max:255',

            'limit_amount' =>
                'required|numeric|min:1',

            'period' =>
                'required|in:weekly,monthly,yearly',

            'start_date' =>
                'required|date',

            'description' =>
                'nullable|string',
        ]);

        Budget::create([

            'user_id' =>
                auth()->id(),

            'budget_name' =>
                $request->budget_name,

            'limit_amount' =>
                $request->limit_amount,
            'spent' => 0,
            'period' =>
                $request->period,

            'start_date' =>
                $request->start_date,

            'description' =>
                $request->description
        ]);

        return redirect()
            ->route('budget.index')
            ->with(
                'success',
                'Budget created successfully.'
            );
    }

    public function edit($id)
    {
        $budget = Budget::where(
            'user_id',
            auth()->id()
        )->findOrFail($id);

        return view(
            'budget.edit',
            compact('budget')
        );
    }

    public function update(
        Request $request,
        $id
    ){
        $request->validate([

            'budget_name' =>
                'required|string|max:255',

            'limit_amount' =>
                'required|numeric|min:1',

            'period' =>
                'required|in:weekly,monthly,yearly',

            'start_date' =>
                'required|date',

            'description' =>
                'nullable|string',
        ]);

        $budget = Budget::where(
            'user_id',
            auth()->id()
        )->findOrFail($id);

        $budget->update([

            'budget_name' =>
                $request->budget_name,

            'limit_amount' =>
                $request->limit_amount,

            'period' =>
                $request->period,

            'start_date' =>
                $request->start_date,

            'description' =>
                $request->description,

            'month' => date(
                'm',
                strtotime($request->start_date)
            ),

            'year' => date(
                'Y',
                strtotime($request->start_date)
            ),
        ]);

        return redirect()
            ->route('budget.index')
            ->with(
                'success',
                'Budget updated successfully.'
            );
    }

    public function show($id)
    {
        $budget = Budget::where(
            'user_id',
            auth()->id()
        )->findOrFail($id);

        $spent = 0;

        $remaining =
            $budget->limit_amount - $spent;

        $percentage = 0;

        return view(
            'budget.detail',
            compact(
                'budget',
                'spent',
                'remaining',
                'percentage'
            )
        );
    }
    public function destroy($id)
    {
    $budget = Budget::where(
        'user_id',
        auth()->id()
    )->findOrFail($id);

    Expense::where(
        'budget_id',
        $budget->id
    )->update([

        'budget_id' => null

    ]);

    $budget->delete();

    return redirect()
        ->route(
            'budget.index'
        )
        ->with(
            'success',
            'Budget deleted'
        );
    }
}