<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ActiveConnectionResource\Pages;
use App\Filament\Resources\ActiveConnectionResource\RelationManagers;

class ActiveConnectionResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationLabel = 'Active Connection';

    protected static ?string $navigationGroup = 'Monitoring';

    protected static ?string $navigationIcon = 'heroicon-s-wifi';

    public static function getLabel(): ?string
    {
        return 'Active Connection';
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
            'index' => Pages\ListActiveConnections::route('/'),
            'create' => Pages\CreateActiveConnection::route('/create'),
            'edit' => Pages\EditActiveConnection::route('/{record}/edit'),
        ];
    }
}
