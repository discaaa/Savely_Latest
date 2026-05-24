<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';

    protected $fillable = [
        'user_id',
        'budget_name',
        'limit_amount',
        'spent',
        'period',
        'start_date',
        'description'
    ];

    protected $casts = [
        'limit_amount' => 'decimal:2',
        'start_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(
            Expense::class
        );
    }
}