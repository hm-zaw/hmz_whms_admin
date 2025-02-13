<?php

namespace App\Http\Controllers;

use App\Models\StockRecord;
use App\Models\PartnerShop;
use App\Models\Product;
use Illuminate\Http\Request;

class StockDataController extends Controller
{
    public function getStockData()
    {
        // Count all stock records (models)
        $modelsCount = Product::count();  // Count all rows in the stock_records table

        // Count all partner shops (customers)
        $customersCount = PartnerShop::count();  // Count all rows in the partner_shops table

        // Count all service centers (just count warehouse branches)
        $serviceCentersCount = StockRecord::count();  // Count all rows in stock_records

        // Count warehouse branches - distinct by 'warehouse_branch'
        $warehouseBranchesCount = StockRecord::distinct('warehouse_branch')->count();

        // Return data as JSON response
        return response()->json([
            'modelsCount' => $modelsCount,
            'customersCount' => $customersCount,
            'serviceCentersCount' => $serviceCentersCount,
            'warehouseBranchesCount' => $warehouseBranchesCount,
        ]);
    }
}

