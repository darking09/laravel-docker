<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalRanking extends Model
{
    use HasFactory;

    public function participantUser() : BelongsTo
    {
        return $this->belongsTo(ParticipantUser::class);
    }
}
