<?php

namespace App\Filament\Resources\BarangResource\Widgets;

use App\Models\Barang;
use App\Models\detail_pesanan;
use App\Models\Pesanan;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class ResourceOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.barang-resource.widgets.resource-overview';
    protected function getCards(): array
    {
        return [
            Card::make('Produk', Barang::all()->count())
                ->description('Jumlah Produk')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
        ];
    }
}
