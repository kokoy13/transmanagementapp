<?php

namespace App\Filament\Resources\SoftRestartResource\Pages;

use App\Filament\Resources\SoftRestartResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftRestarts extends ListRecords
{
    protected static string $resource = SoftRestartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
