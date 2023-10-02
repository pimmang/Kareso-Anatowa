<?php

namespace App\Filament\Resources\PesananResource\Widgets;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card ;

class PesananOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.pesanan-resource.widgets.pesanan-overview';
    protected function getCards(): array
    {
        $verifikasi =  Pembayaran::where('status','Diverifikasi')->count();
        $sudahbayar =  Pembayaran::where('status','Sudah Bayar')->count();
        $selesai =  Pembayaran::where('status','Selesai')->count();
        $diantar =  Pembayaran::where('status','Diantar')->count();
        return [
        
            Card::make('Pesanan', Pesanan::where('status',1)->count())
                ->description('Berhasil Di Checkout')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Pesanan', Pesanan::where('status',0)->count())
                ->description('Belum Dicheckout')
                ->descriptionIcon('heroicon-s-trending-down')
                ->color('danger'),
            Card::make('Pesanan', $verifikasi)
                ->description('Untuk Diverifikasi')
                ->color('danger'),   
            Card::make('Pesanan', $sudahbayar)
                ->description('Sudah Bayar')
                ->color('primary'), 
            Card::make('Pesanan', $diantar)
                ->description('Diantar')
                ->color('warning'), 
            Card::make('Pesanan', $selesai)
                ->description('Selesai')
                ->color('success'), 

        ];
    }
}
