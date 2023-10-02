<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GambarBarangResource\Pages;
use App\Filament\Resources\GambarBarangResource\RelationManagers;
use App\Models\Gambar_Barang;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;


class GambarBarangResource extends Resource
{
    protected static ?string $model = Gambar_Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Barang.nama_barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('barang.merk', 'Merk')->searchable(),
                Tables\Columns\ImageColumn::make('gambar_barang')
            
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->after(
                    function(Gambar_Barang $record){
                        if($record->gambar_barang){
                            Storage::disk('public')->delete($record->gambar_barang);
                        }
                    }
                ),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                ->action(function (Collection $records) {
                    $records->each(function ($record) {
                        if ($record->gambar_barang) {
                            Storage::disk('public')->delete($record->gambar_barang);
                        }
                        
                        $record->delete();
                    });
                }),
           
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGambarBarangs::route('/'),
            'create' => Pages\CreateGambarBarang::route('/create'),
            'edit' => Pages\EditGambarBarang::route('/{record}/edit'),
        ];
    }    
}
