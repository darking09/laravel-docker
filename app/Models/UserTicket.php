<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    use HasFactory;

    public function participantUser() : BelongsTo
    {
        return $this->belongsTo(ParticipantUser::class);
    }

    public function ticket() : BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function weeklyRanking() : BelongsTo
    {
        return $this->belongsTo(WeeklyRanking::class);
    }
}
