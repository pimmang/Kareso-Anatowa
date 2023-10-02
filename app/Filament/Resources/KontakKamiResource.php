<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakKamiResource\Pages;
use App\Filament\Resources\KontakKamiResource\RelationManagers;
use App\Models\Kontak_Kami;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakKamiResource extends Resource
{
    protected static ?string $model = Kontak_Kami::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_hp')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pesan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nomor_hp'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('pesan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
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
            'index' => Pages\ListKontakKamis::route('/'),
            'create' => Pages\CreateKontakKami::route('/create'),
            'edit' => Pages\EditKontakKami::route('/{record}/edit'),
        ];
    }    
}
