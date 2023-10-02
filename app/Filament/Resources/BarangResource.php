<?php

namespace App\Filament\Resources;
use App\Models\Kategori;
use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use App\Models\Barang_Kategori;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Resources\Forms\Components\MultiSelect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Card::make()->Schema([
                TextInput::make('nama_barang')
                    ->required()
                    ->maxLength(255),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(999),
                TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('merk')
                    ->required()
                    ->maxLength(255),
                TextInput::make('berat')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(999),
                Select::make('kategori')
                    ->required()
                    ->multiple()
                    ->relationship('kategori','nama_kategori')->preload(), 
                FileUpload::make('gambar')
                    ->label('gambar')
                    ->image()->disk('public')
                    ->multiple()
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\TextColumn::make('stok')->sortable(),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('merk')->searchable(),
                Tables\Columns\TextColumn::make('berat'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
        
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->before(function (Collection $records) {
                    foreach ($records as $record){
                    $gambarr =$record->Gambar_Barang;
                    // dd($gambarr);
                    // Hapus semua gambar terkait
                    foreach ($gambarr as $gambar) {
                        if ($gambar->gambar_barang) {
                            Storage::disk('public')->delete($gambar->gambar_barang);
                        }
                    }
                }
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }    
    public static function getWidgets(): array
    {
    return [
        BarangResource\Widgets\ResourceOverview::class,
    ];
    }
}
