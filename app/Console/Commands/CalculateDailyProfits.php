<?php

namespace App\Console\Commands;

use App\Models\Investment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CalculateDailyProfits extends Command
{
    protected $signature = 'investments:calculate-profits';
    protected $description = 'Calculate daily compound interest for active investments';

    public function handle()
    {
        Investment::where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('last_compounded_at')
                    ->orWhere('last_compounded_at', '<', now()->subDay());
            })
            ->each(function ($investment) {
                $investment->calculateDailyProfit();
            });

        Log::info('Daily profits calculated for all active investments');
        $this->info('Daily profits calculated successfully.');
    }
}
