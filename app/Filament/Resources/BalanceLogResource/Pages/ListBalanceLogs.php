<?php

namespace App\Filament\Resources\BalanceLogResource\Pages;

use App\Filament\Resources\BalanceLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBalanceLogs extends ListRecords
{
    protected static string $resource = BalanceLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
