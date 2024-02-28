<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyRankingType extends Model
{
    use HasFactory;

    public function weeklyRankings() : HasMany
    {
        return $this->hasMany(WeeklyRanking::class);
    }
}
