<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyRanking extends Model
{
    use HasFactory;

    public function participantUser() : BelongsTo
    {
        return $this->belongsTo(ParticipantUser::class);
    }

    public function userTickets() : HasMany
    {
        return $this->hasMany(UserTicket::class);
    }

    public function weeklyRankingType() : BelongsTo
    {
        return $this->belongsTo(WeeklyRankingType::class);
    }
}
