<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingTransaction;
use App\Services\SavingTransactionService;

class SavingTransactionController extends Controller
{
    protected $savingTransactionService;

    public function __construct(
        SavingTransactionService $savingTransactionService
    ) {
        $this->savingTransactionService =
            $savingTransactionService;
    }

    public function store(Request $request)
    {
        $this->savingTransactionService
            ->createTransaction($request->all());

        return back();
    }

    public function destroy($id)
    {
        $transaction = SavingTransaction::findOrFail($id);

        $this->savingTransactionService
            ->deleteTransaction($transaction);

        return back();
    }
}