<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingCategory extends Model {
    protected $table = 'saving_categories';

    protected $fillable = [
        'name',
    ];

    public function savings() {
        return $this->hasMany(Saving::class, 'category_id');
    }
}