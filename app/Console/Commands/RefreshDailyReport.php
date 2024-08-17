<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaksi;
use Carbon\Carbon;

class RefreshDailyReport extends Command
{
    protected $signature = 'report:refresh-daily';
    protected $description = 'Refresh laporan transaksi harian setiap hari';

    public function handle()
    {
        $today = Carbon::today()->toDateString();

        // Logika refresh laporan harian, bisa berupa cache clearing atau update lainnya
        Transaksi::whereDate('created_at', '<', $today)->delete();

        $this->info('Laporan harian telah diperbarui.');
    }
}