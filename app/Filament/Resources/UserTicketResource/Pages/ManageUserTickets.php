<?php

namespace App\Filament\Resources\UserTicketResource\Pages;

use App\Filament\Resources\UserTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUserTickets extends ManageRecords
{
    protected static string $resource = UserTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
