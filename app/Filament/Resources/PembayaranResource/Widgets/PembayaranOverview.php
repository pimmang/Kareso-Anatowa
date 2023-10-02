<?php

namespace App\Filament\Resources\PembayaranResource\Widgets;

use App\Models\Pembayaran;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PembayaranOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $verifikasi =  Pembayaran::where('status','Diverifikasi')->count();
        $sudahbayar =  Pembayaran::where('status','Sudah Bayar')->count();
        $selesai =  Pembayaran::where('status','Selesai')->count();
        $diantar =  Pembayaran::where('status','Diantar')->count();
        $belum =  Pembayaran::where('status','Belum Bayar')->count();
        $bank =  Pembayaran::where('metode_pembayaran','Bank Transfer')->count();
        $e_wallet =  Pembayaran::where('metode_pembayaran','Transfer E-Wallet')->count();
        return [
            Card::make('Pembayaran', $belum)
                ->description('Belum Bayar')
                ->color('danger'),  
            Card::make('Pembayaran', $verifikasi)
                ->description('Diverifikasi')
                ->color('danger'),   
            Card::make('Pembayaran', $sudahbayar)
                ->description('Sudah Bayar')
                ->color('primary'), 
            Card::make('Pembayaran', $diantar)
                ->description('Diantar')
                ->color('warning'), 
            Card::make('Pembayaran', $selesai)
                ->description('Selesai')
                ->color('success'),
            Card::make('Metode Pembayaran', $e_wallet)
                ->description('Transfer E-Wallet')
                ->color('success'),
            Card::make('Metode Pembayaran', $bank)
                ->description('Transfer Bank')
                ->color('success')
        ];
    }
}
