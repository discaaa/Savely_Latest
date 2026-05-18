<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavingController extends Controller
{
    public function index() {
        // Mengambil semua goal milik user yang sedang login
        return response()->json(Goal::where('user_id', auth()->id())->get());
    }

    public function storeGoal(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'target_amount' => 'required|numeric',
            'target_date' => 'required|date',
            'category' => 'required|string'
        ]);

        $goal = Goal::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'target_amount' => $validated['target_amount'],
            'target_date' => $validated['target_date'],
            'category' => $validated['category']
        ]);

        return response()->json(['status' => 'success', 'data' => $goal], 201);
    }

    public function addSaving(Request $request, $goalId) {
        $request->validate(['amount' => 'required|numeric|min:1000']);
        
        $goal = Goal::where('user_id', auth()->id())->findOrFail($goalId);
        $user = auth()->user();

        if ($user->balance < $request->amount) {
            return response()->json(['message' => 'Saldo tidak cukup'], 400);
        }

        return DB::transaction(function () use ($goal, $user, $request) {
            $user->decrement('balance', $request->amount);
            $goal->increment('collected_amount', $request->amount);

            Saving::create([
                'goal_id' => $goal->id,
                'amount' => $request->amount,
            ]);

            if ($goal->collected_amount >= $goal->target_amount) {
                $goal->update(['status' => 'achieved']);
            }

            return response()->json(['message' => 'Berhasil menabung!', 'data' => $goal]);
        });
    }
}
