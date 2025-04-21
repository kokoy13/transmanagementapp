<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Others';

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    public static function canViewAny(): bool{
        return Auth::check() &&  Auth::user()->role == 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                            ->label('Username')
                            ->required(),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->required(),
                        ]),
                        TextInput::make('password')
                            ->password()
                            ->required()
                            ->label('Password')
                            ->dehydrated(fn ($state) => filled($state)) // agar hanya tersimpan jika diisi
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state)) // enkripsi password sebelum simpan
                            ->autocomplete('new-password'),
                        Radio::make('role')
                            ->label('Role')
                            ->options([
                                'marketing' => "Marketing",
                                'admin' => 'Admin'
                            ])
                            ->inline()
                            ->default('marketing')
                            ->inlineLabel(false)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Username'),
                TextColumn::make('email')
                    ->label('E-mail'),
                TextColumn::make('role')
                    ->label('Role')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
