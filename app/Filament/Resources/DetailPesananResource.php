<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPesananResource\Pages;
use App\Filament\Resources\DetailPesananResource\RelationManagers;
use App\Models\Detail_Pesanan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPesananResource extends Resource
{
    protected static ?string $model = Detail_Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pesanan.user.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pesanan.id'),
                Tables\Columns\TextColumn::make('Barang.nama_barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah_barang'),
                Tables\Columns\TextColumn::make('jumlah_harga'),
                Tables\Columns\TextColumn::make('jumlah_berat'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
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
            'index' => Pages\ListDetailPesanans::route('/'),
            // 'edit' => Pages\EditDetailPesanan::route('/{record}/edit'),
        ];
    }    
}
