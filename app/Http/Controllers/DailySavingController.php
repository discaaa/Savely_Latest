<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\SavingTransaction;
use App\Services\SavingTransactionService;
use Illuminate\Support\Facades\Auth;

class DailySavingController extends Controller
{
    protected $savingTransactionService;

    public function __construct(
        SavingTransactionService $savingTransactionService
    ){
        $this->savingTransactionService =
            $savingTransactionService;
    }

    public function index()
    {
        $goals = Goal::where(
            'user_id',
            Auth::id()
        )->latest()->get();

        $totalSaving = $goals->sum(
            'current_amount'
        );

        return view(
            'saving.daily',
            compact(
                'goals',
                'totalSaving'
            )
        );
    }

    public function create()
    {
        $goals = Goal::where(
            'user_id',
            Auth::id()
        )->get();

        return view(
            'saving.newsaving',
            compact('goals')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'goal_id' => 'required|exists:goals,id',

            'amount' => 'required|numeric|min:1',

            'saving_date' => 'required|date',

        ]);

        $goal = Goal::where(
            'id',
            $request->goal_id
        )->where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $this->savingTransactionService
            ->createTransaction([

                'goal_id' => $goal->id,

                'amount' => $request->amount,

                'saving_date' => $request->saving_date,

            ]);

        return redirect()
            ->route('saving.daily')
            ->with(
                'success',
                'Saving added successfully!'
            );
    }

    public function destroy($id)
    {
        $transaction = SavingTransaction::where(
            'id',
            $id
        )->whereHas('goal', function($query){

            $query->where(
                'user_id',
                Auth::id()
            );

        })->firstOrFail();

        $this->savingTransactionService
            ->deleteTransaction($transaction);

        return redirect()
            ->route('saving.daily');
    }
}