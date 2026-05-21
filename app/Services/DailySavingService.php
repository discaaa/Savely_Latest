<?php

namespace App\Services;

use App\Models\Saving;

class DailySavingService
{
    public function getAllSavings() {
        return Saving::with('category')->latest()->get();
    }

    public function createSaving($data) {
        return Saving::create([
            'user_id' => 1,
            'category_id' => $data['category_id'],
            'amount' => $data['amount'],
            'note' => $data['note'] ?? null,
            'saving_date' => now(),
        ]);
    }

    public function updateSaving($saving, $data) {
        return $saving->update([
            'category_id' => $data['category_id'],
            'amount' => $data['amount'],
            'note' => $data['note'] ?? null,
        ]);
    }

    public function deleteSaving($saving) {
        return $saving->delete();
    }
}