<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SoftRestart;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SoftRestartResource\Pages;
use App\Filament\Resources\SoftRestartResource\RelationManagers;

class SoftRestartResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationLabel = 'Soft Restart';

    protected static ?string $navigationGroup = 'Others';

    protected static ?string $navigationIcon = 'heroicon-s-arrow-path';

    public static function getPluralLabel(): ?string
    {
        return 'Soft Restart';
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSoftRestarts::route('/'),
            'create' => Pages\CreateSoftRestart::route('/create'),
            'edit' => Pages\EditSoftRestart::route('/{record}/edit'),
        ];
    }
}
