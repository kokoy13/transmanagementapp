<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\ApiMikrotikController;
use RouterOS\Query;

class MikrotikCustomers extends Component implements HasTable
{
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Interface Name'),
                TextColumn::make('type')->label('Type'),
                TextColumn::make('running')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state) => $state === 'true' ? 'success' : 'danger')
                    ->formatStateUsing(fn ($state) => $state === 'true' ? 'Running' : 'Stopped'),
            ]);
    }

    public function getTableRecords(): Paginator
    {
        $api = new ApiMikrotikController();
        $client = $api->index();

        $query = new Query('/interface/print');
        $response = $client->query($query)->read();

        $collection = collect($response);
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = $collection
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values();

        return new LengthAwarePaginator(
            $currentItems,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    public function render()
    {
        return view('livewire.mikrotik-customers');
    }
}
