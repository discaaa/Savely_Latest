<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model {
    protected $table = 'goals';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'target_amount',
        'current_amount',
        'deadline',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function transactions(){
        return $this->hasMany(SavingTransaction::class);
    }
}
