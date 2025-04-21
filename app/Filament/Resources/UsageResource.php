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
use App\Filament\Resources\UsageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UsageResource\RelationManagers;

class UsageResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationGroup = 'Monitoring';

    protected static ?string $navigationLabel = 'Usage';

    protected static ?string $navigationIcon = 'heroicon-s-chart-pie';

    public static function getModelLabel(): string
    {
        return 'Usage';
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
            'index' => Pages\ListUsages::route('/'),
            'create' => Pages\CreateUsage::route('/create'),
            'edit' => Pages\EditUsage::route('/{record}/edit'),
        ];
    }
}
