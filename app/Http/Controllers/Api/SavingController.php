<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Saving;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavingController extends Controller
{
    /**
     * Menampilkan semua goal user login
     */
    public function index()
    {
        $goals = Goal::where('user_id', auth()->id())->get();

        return response()->json([
            'status' => 'success',
            'data' => $goals
        ]);
    }

    /**
     * Membuat goal baru
     */
    public function storeGoal(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:1000',
            'target_date' => 'required|date',
            'category' => 'required|string|max:255'
        ]);

        $goal = Goal::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'target_amount' => $validated['target_amount'],
            'current_amount' => 0,
            'target_date' => $validated['target_date'],
            'category' => $validated['category'],
            'status' => 'ongoing'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Goal created successfully',
            'data' => $goal
        ], 201);
    }

    /**
     * Menambahkan saving ke goal
     */
    public function addSaving(Request $request, $goalId)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1000'
        ]);

        $amount = (float) $validated['amount'];

        return DB::transaction(function () use ($goalId, $amount) {

            // Lock user agar aman dari race condition
            $user = User::lockForUpdate()->find(auth()->id());

            // Cari goal milik user
            $goal = Goal::where('user_id', $user->id)
                ->lockForUpdate()
                ->findOrFail($goalId);

            // Cek saldo
            if ($user->balance < $amount) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Insufficient balance'
                ], 400);
            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE MANUAL (TANPA decrement())
            |--------------------------------------------------------------------------
            | Karena decrement() sering bermasalah jika:
            | - field balance NULL
            | - cast tidak sesuai
            | - object belum refresh
            |--------------------------------------------------------------------------
            */

            // Kurangi saldo user
            $user->balance = $user->balance - $amount;
            $user->save();

            // Tambah current amount goal
            $goal->current_amount = $goal->current_amount + $amount;
            $goal->save();

            // Simpan riwayat saving
            $saving = Saving::create([
                'user_id' => $user->id,
                'goal_id' => $goal->id,
                'amount' => $amount,
                'type' => 'deposit',
                'status' => 'success',
                'date' => now(),
            ]);

            // Update status goal jika tercapai
            if ($goal->current_amount >= $goal->target_amount) {
                $goal->status = 'achieved';
                $goal->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => $goal->status === 'achieved'
                    ? 'Congratulations! Goal achieved!'
                    : 'Saving added successfully',
                'goal' => $goal,
                'saving' => $saving,
                'remaining_balance' => $user->balance
            ], 200);
        });
    }

    /**
     * History saving user
     */
    public function history()
    {
        $savings = Saving::with('goal')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $savings
        ]);
    }
}