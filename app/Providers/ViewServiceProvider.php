<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;  // ✅ Import DB

use App\Models\StockRecord;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share low stock items with the navbar or all views
        View::composer('partials.navbar', function ($view) {
            $currentDate = Carbon::today()->toDateString();

            $lowStockItems = StockRecord::select('stock_records.*')
                ->whereIn('id', function ($query) use ($currentDate) {
                    $query->select(DB::raw('MAX(id)'))
                        ->from('stock_records')
                        ->where('record_date', '<=', $currentDate)
                        ->groupBy('product_id');
                })
                ->where('closing_balance', '<', 2)
                ->with('product')
                ->get();

            $view->with([
                'lowStockItems' => $lowStockItems,
                'lowStockCount' => $lowStockItems->count(),
            ]);
        });
    }
}
