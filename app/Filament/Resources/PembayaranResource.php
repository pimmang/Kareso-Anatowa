<?php

namespace App\Filament\Resources;
use Filament\Tables\Actions\Action;
use App\Filament\Actions\updateStatusTerkirim;
use App\Filament\Actions\UpdateStatusTerkirimAction;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('pesanan_id')
                    ->relationship('pesanan', 'id')
                    ->required(),
                Forms\Components\TextInput::make('kurir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('service')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ongkos_kirim')
                    ->required(),
                Forms\Components\TextInput::make('total_bayar')
                    ->required(),
                Forms\Components\TextInput::make('kode_unik')
                    ->required(),
                Forms\Components\TextInput::make('metode_pembayaran')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->options([
                        'Sudah Bayar' => 'Sudah Bayar',
                        'Diantar' => 'Diantar',
                        'Selesai' => 'Selesai',
                        'Diverivikasi' => 'Diverifikasi',
                        'Belum Bayar' => 'Belum Bayar',
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pesanan.id'),
                Tables\Columns\TextColumn::make('kurir'),
                Tables\Columns\TextColumn::make('service'),
                Tables\Columns\TextColumn::make('ongkos_kirim'),
                Tables\Columns\TextColumn::make('total_bayar')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_unik'),
                Tables\Columns\TextColumn::make('metode_pembayaran'),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }  
    public static function getWidgets(): array
    {
    return [
        BarangResource\Widgets\ResourceOverview::class,
    ];
    }  
}

