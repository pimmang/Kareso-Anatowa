<?php

namespace App\Filament\Resources\KontakKamiResource\Pages;

use App\Filament\Resources\KontakKamiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKontakKami extends EditRecord
{
    protected static string $resource = KontakKamiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
