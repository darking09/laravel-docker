<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantUserResource\Pages;
use App\Filament\Resources\ParticipantUserResource\RelationManagers;
use App\Models\ParticipantUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParticipantUserResource extends Resource
{
    protected static ?string $model = ParticipantUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('email')
                ->email(),
                Forms\Components\TextInput::make('ID_number')
                ->label('ID number')
                ->numeric(),
                Forms\Components\TextInput::make('phone_number')
                ->tel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->icon('heroicon-s-user-circle')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('ID_number')
                ->label('ID number')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->icon('heroicon-s-envelope')
                ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                ->icon('heroicon-s-phone')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParticipantUsers::route('/'),
            'create' => Pages\CreateParticipantUser::route('/create'),
            'edit' => Pages\EditParticipantUser::route('/{record}/edit'),
        ];
    }
}
