<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use App\Models\Banner;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
// use Filament\Widgets\StatsOverviewWidget\Card;
use App\Filament\Resources\BannerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BannerResource\RelationManagers;
// use Filament\Infolists\Components\Card;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;


class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-s-view-columns';

    protected static ?string $navigationGroup = 'Contents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Banner Name'),
                        FileUpload::make('img')
                            ->label('Image')
                            ->disk('transnetsumbar')
                            ->disk('public')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Banner Name'),
                ImageColumn::make('img')
                    ->label('thumbhnail')
            ])
            ->filters([
                // Tables\Filters\trashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    // Tables\Actions\ForceDeleteBulkAction::make(),
                    // Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
