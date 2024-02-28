<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantUser extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'ID_number', 'phone_number'];

    public function userTickets() : HasMany
    {
        return $this->hasMany(UserTicket::class);
    }

    public function weeklyRankings() : HasMany
    {
        return $this->hasMany(WeeklyRanking::class);
    }

    public function globalRanking() : BelongsTo
    {
        return $this->belongsTo(GlobalRanking::class);
    }
}
