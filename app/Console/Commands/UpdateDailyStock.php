<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateDailyStock extends Command
{
    protected $signature = 'stocks:update-daily';
    protected $description = 'Update stock records for all products daily';

    public function handle()
    {
        $yesterday = Carbon::yesterday()->toDateString();
        $today = Carbon::today()->toDateString();

        $products = Product::all();

        foreach ($products as $product) {
            $lastStock = Stock::where('product_id', $product->id)
                ->where('record_date', $yesterday)
                ->first();

            if ($lastStock) {
                Stock::create([
                    'record_date' => $today,
                    'product_id' => $product->id,
                    'warehouse_branch' => 'Dawbon',
                    'opening_balance' => $lastStock->closing_balance,
                    'received' => 0,
                    'dispatched' => 0,
                    'closing_balance' => $lastStock->closing_balance,
                    'system_users_id' => 1, // Change this as needed
                ]);
            }
        }

        $this->info('Stock records updated successfully for ' . $today);
    }
}
