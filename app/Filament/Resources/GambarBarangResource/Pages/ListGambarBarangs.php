<?php

namespace App\Filament\Resources\GambarBarangResource\Pages;

use App\Filament\Resources\GambarBarangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGambarBarangs extends ListRecords
{
    protected static string $resource = GambarBarangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
