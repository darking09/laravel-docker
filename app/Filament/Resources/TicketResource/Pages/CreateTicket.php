<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\TicketType;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $currentTicketType = TicketType::find($data['ticket_type_id'])->first();
        $data['value'] = $currentTicketType->value;

        return $data;
    }
}
