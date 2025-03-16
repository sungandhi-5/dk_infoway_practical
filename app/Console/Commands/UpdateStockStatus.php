<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;

class UpdateStockStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates stock entries status to "In-Stock" if In-Stock Date is today.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = \Carbon\Carbon::today()->toDateString();

        // Update stock entries where in_stock_date is today
        $updatedRows = Stock::where('in_stock_date', $today)->update(['status' => config('constant.STOCK_STATUS.IN_STOCK')]);

        // Log and display the result
        if ($updatedRows > 0) {
            \Log::info("$updatedRows stock entries updated to In-Stock.");
        } else {
            \Log::info("No stock entries found for today.");
        }
    }
}
