<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model {
    protected $fillable = ['user_id', 'name', 'target_amount', 'collected_amount', 'target_date', 'category', 'status'];
    protected $appends = ['achievement_percentage'];

    public function getAchievementPercentageAttribute() {
        return $this->target_amount > 0 ? ($this->collected_amount / $this->target_amount) * 100 : 0;
    }

    public function savings() {
        return $this->hasMany(Saving::class);
    }
}
