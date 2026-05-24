<?php

namespace App\Services;

use App\Models\Goal;
use App\Models\SavingTransaction;

class SavingTransactionService {
    public function createTransaction($data) {
        SavingTransaction::create([
            'user_id' => auth()->id(),
            'goal_id' => $data['goal_id'],
            'amount' => $data['amount'],
            'saving_date' => $data['saving_date'],
            'method' => $data['method'] ?? 'Manual',
            'note' => $data['note'] ?? null
        ]);

        $goal = Goal::findOrFail($data['goal_id']);

        $goal->current_amount += $data['amount'];

        // auto update
        if ($goal->current_amount >= $goal->target_amount) {
            $goal->status = 'completed';
        }
        else{
            $goal->status = 'ongoing';
        }

        $goal->save();
    }

    public function deleteTransaction($transaction) {
        return $transaction->delete();
    }
}