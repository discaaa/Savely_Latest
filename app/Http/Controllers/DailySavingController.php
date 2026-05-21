<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\SavingTransaction;
use App\Services\SavingTransactionService;

class DailySavingController extends Controller
{
    protected $savingTransactionService;

    public function __construct(
        SavingTransactionService $savingTransactionService
    ) {
        $this->savingTransactionService =
            $savingTransactionService;
    }

    public function index()
    {
        $goals = Goal::latest()->get();
        $totalSaving = $goals->sum('current_amount');
        return view('saving.daily', compact('goals', 'totalSaving'));
    }

    public function create()
    {
        $goals = Goal::all();

        return view(
            'saving.newsaving',
            compact('goals')
        );
    }

    public function store(Request $request)
    {
        $this->savingTransactionService
            ->createTransaction($request->all());

        return redirect()
            ->route('saving.daily');
    }
}