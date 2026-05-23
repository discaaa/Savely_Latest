<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model {

    protected $fillable = [
        'user_id',
        'title',
        'target_amount',
        'current_amount',
        'status'
    ];
    
    public function transactions(){
        return $this->hasMany(SavingTransaction::class, 'goal_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
