<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MikrotikPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-server';
    protected static string $view = 'filament.pages.mikrotik-page';
    protected static ?string $title = 'Mikrotik Interfaces';
    protected static ?string $navigationLabel = 'Mikrotik Interfaces';
}


