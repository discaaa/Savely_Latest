<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingTransaction;
use App\Services\SavingTransactionService;
use Illuminate\Support\Facades\Auth;

class SavingTransactionController extends Controller
{
    protected $savingTransactionService;

    public function __construct(
        SavingTransactionService $savingTransactionService
    ){
        $this->savingTransactionService =
            $savingTransactionService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal_id' => 'required|exists:goals,id',
            'amount' => 'required|numeric|min:1',
            'saving_date' => 'required|date',
        ]);

        $goal = \App\Models\Goal::where(
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

        return back()
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

        return back()
            ->with(
                'success',
                'Transaction deleted!'
            );
    }
}