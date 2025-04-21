<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacketResource\Pages;
use App\Filament\Resources\PacketResource\RelationManagers;
use App\Models\Packet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PacketResource extends Resource
{
    protected static ?string $model = Packet::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    protected static ?string $navigationGroup = 'Contents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('bandwidth')
                    ->label('Bandwidth')
                    ->suffix('Mbps')
                    ->options([
                        10 => '10',
                        20 => '20',
                        30 => '30',
                        40 => '40',
                        50 => '50',
                        60 => '60',
                        70 => '70',
                        80 => '80',
                        90 => '90',
                        100 => '100',
                    ])
                    ->required()
                    ->native(false)
                    ->searchable(),
                TextInput::make('price')
                    ->minValue(100000)
                    ->integer()
                    ->prefix('RP')
                    ->required(),
                Select::make('rasio')
                    ->label('Rasio')
                    ->options([
                        '1:1' => '1:1',
                        '1:4' => '1:4',
                        '1:8' => '1:8',
                    ])
                    ->required()
                    ->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Packet Name')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Family' => 'success',
                        'Office' => 'warning',
                        'Internet Kerja' => 'success',
                        'Dedicated' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('bandwidth')
                    ->sortable()
                    ->searchable()
                    ->label('Bandwidth')
                    ->suffix(' Mbps'),
                TextColumn::make('price')
                    ->searchable()
                    ->money('IDR')
                    ->label('Price'),
                TextColumn::make('rasio')
                    ->sortable()
                    ->searchable()
                    ->label('Rasio')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPackets::route('/'),
            'create' => Pages\CreatePacket::route('/create'),
            'edit' => Pages\EditPacket::route('/{record}/edit'),
        ];
    }
}
