<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Pages\Actions;
use App\Models\Gambar_Barang;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Create the product record first.
        $record = static::getModel()::create($data);

        // Then create the image records for each uploaded file.
        foreach ($data['gambar'] as $file) {
            Gambar_Barang::create([
                'barang_id' => $record->id,
                'gambar_barang' => $file,
            ]);
        }

        return $record;
    }
}
