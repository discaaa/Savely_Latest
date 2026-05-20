<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saving;

class SavingController extends Controller
{
    // DAILY PAGE
    public function index()
    {
        $savings = Saving::latest()->get();

        $totalSaving = Saving::sum('amount') ?? 0;

        $monthlySaving = Saving::whereMonth('date', now()->month)
            ->sum('amount') ?? 0;

        return view('saving.daily', compact('savings', 'totalSaving', 'monthlySaving'));
    }

    // FORM PAGE
    public function create()
    {
        return view('saving.newsaving');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'method' => 'required|string',
            'note' => 'nullable|string',
        ]);

        Saving::create([
            'user_id' => 1,
            'name' => $request->name,
            'amount' => $request->amount,
            'date' => $request->date,
            'type' => $request->method,
            'note' => $request->note,
        ]);

        return redirect()->route('saving.daily');
    }
}