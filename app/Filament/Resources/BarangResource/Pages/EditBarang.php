<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use App\Models\Barang;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Gambar_Barang;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditBarang extends EditRecord
{
    protected static string $resource = BarangResource::class;
   

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Update the product record first.
        $record->update($data);

        // Then delete the image records that are not in the uploaded files.
        if (isset($record->gambar) && !empty($record->gambar) && (is_array($record->gambar) || is_object($record->gambar))) {
            // Then loop through $record->gambar with foreach()
            foreach ($record->gambar as $gambar) {
                if (!in_array($gambar->file, $data['gambar'])) {
                    $gambar->delete();
                }
            }
        }
        
        
       

        // Then create the image records for each new uploaded file.
            foreach ($data['gambar'] as $file) {
                    Gambar_Barang::create([
                        'barang_id' => $record->id,
                        'gambar_barang' => $file,
                    ]);
            }   
        return $record;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function (Barang $record) {
                    $gambarr =$record->Gambar_Barang;
                    // dd($gambarr);
                    // Hapus semua gambar terkait
                    foreach ($gambarr as $gambar) {
                        if ($gambar->gambar_barang) {
                            Storage::disk('public')->delete($gambar->gambar_barang);
                        }
                    }
                }),
        ];
        
    }
}
