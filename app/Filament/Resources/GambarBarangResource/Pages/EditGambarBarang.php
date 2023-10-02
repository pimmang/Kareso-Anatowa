<?php

namespace App\Filament\Resources\GambarBarangResource\Pages;

use App\Filament\Resources\GambarBarangResource;
use App\Models\Gambar_Barang;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EditGambarBarang extends EditRecord
{
    protected static string $resource = GambarBarangResource::class;

    protected function getActions(): array
    {
        
            return [
                Actions\DeleteAction::make()->after(
                    function(Gambar_Barang $record){
                        if($record->gambar_barang){
                            Storage::disk('public')->delete($record->gambar_barang);
                        }
                    }
                ),
            ];
    
    }
}
