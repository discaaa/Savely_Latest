<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saving extends Model {
    protected $table = 'savings';

    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'note',
        'saving_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(SavingCategory::class, 'category_id');
    }
}
