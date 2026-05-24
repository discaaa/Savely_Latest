<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model {
    protected $table = 'saving_transaction';
    
    protected $fillable = [
        'user_id',
        'goal_id',
        'amount',
        'saving_date',
        'method',
        'note',
    ];

    public function goal() {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}