<?php

namespace App\Filament\Resources\ParticipantUserResource\Pages;

use App\Filament\Resources\ParticipantUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParticipantUsers extends ListRecords
{
    protected static string $resource = ParticipantUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
