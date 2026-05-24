<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $table = 'expense_categories';

    protected $fillable = [
        'name',
        'icon',
        'color',
    ];

    public function expenses()
    {
        return $this->hasMany(
            Expense::class,
            'category_id'
        );
    }

    public function budgets()
    {
        return $this->hasMany(
            Budget::class,
            'category_id'
        );
    }

    public function getTotalExpenseAttribute()
    {
        return $this->expenses()
            ->sum('amount');
    }
}