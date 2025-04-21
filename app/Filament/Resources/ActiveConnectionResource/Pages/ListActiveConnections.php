<?php

namespace App\Filament\Resources\ActiveConnectionResource\Pages;

use App\Filament\Resources\ActiveConnectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActiveConnections extends ListRecords
{
    protected static string $resource = ActiveConnectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
