<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockRecord;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SystemNotificationController extends Controller
{
    public function index()
    {
        $currentDate = '2024-12-31';

        // Get latest stock records for each product
        $latestRecords = DB::table('stock_records as sr1')
            ->select('sr1.*')
            ->whereNotExists(function($query) {
                $query->from('stock_records as sr2')
                    ->whereRaw('sr1.product_id = sr2.product_id')
                    ->whereRaw('sr1.record_date < sr2.record_date');
            })
            ->where('sr1.record_date', '<=', $currentDate)
            ->where('sr1.closing_balance', '<', 2)
            ->get();

        // Get the full records with product relationships
        $lowStockItems = StockRecord::with('product')
            ->whereIn('id', $latestRecords->pluck('id'))
            ->get();

        return view('adm_system_notification', [
            'lowStockItems' => $lowStockItems
        ]);
    }
}

