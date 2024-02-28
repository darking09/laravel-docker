<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'value', 'ticket_type_id'];

    public function ticketType() : BelongsTo
    {
        return $this->belongsTo(TicketType::class);
    }
}
