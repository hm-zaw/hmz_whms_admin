<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ChartController extends Controller
{
    public function index()
    {

        // Get the current month in 'YYYY-MM' format
        $currentMonth = Carbon::now()->format('Y-m');

        // Get the last year's value dynamically
        $lastYear = date('Y') - 1;

// Get the monthly sales data for the last year
        $salesData = DB::table('sales_invoices')
            ->select(DB::raw("strftime('%Y-%m', sale_date) AS sale_month"), DB::raw("SUM(total_mmk) AS total_monthly_sales"))
            ->whereYear('sale_date', $lastYear) // Filter data for the last year
            ->groupBy(DB::raw("strftime('%Y-%m', sale_date)"))
            ->orderBy(DB::raw("strftime('%Y-%m', sale_date)"))
            ->get();

// Prepare the labels and data for the chart
        $labels = $salesData->pluck('sale_month')->toArray();
        $data = $salesData->pluck('total_monthly_sales')->toArray();

// Prepare the data for the Flask API (same format that you send)
        $flaskData = $salesData->map(function($item) {
            return [
                'sale_date' => $item->sale_month,
                'total_mmk' => $item->total_monthly_sales
            ];
        })->toArray();

// Create a Guzzle client to send the request to Flask
        $client = new Client();

        try {
            // Send the sales data to Flask
            $response = $client->post('http://127.0.0.1:5000/predict-sales', [
                'json' => $flaskData // Send the filtered sales data (last year)
            ]);

            // Get the prediction data from Flask response
            $predictions = json_decode($response->getBody()->getContents(), true)['predictions'];

            // If no predictions are received or if the predictions data is empty, set a fallback value
            if (empty($predictions)) {
                $predictions = [];
            }

        } catch (\Exception $e) {
            // Log the error message and set predictions to an empty array or fallback data
            error_log("Error connecting to Flask server: " . $e->getMessage());
            $predictions = []; // Set default empty predictions
        }

        // Get the sales data for the current month, including shop name and total quantity sold
        $shopData = DB::table('sales_invoices as si')
            ->select(DB::raw("ps.partner_shops_name as shop_name"),
                DB::raw("strftime('%Y-%m', si.sale_date) AS sale_month"),
                DB::raw("SUM(si.quantity) AS total_quantity"))
            ->join('partner_shops as ps', 'si.partner_shops_id', '=', 'ps.partner_shops_id')
            ->whereRaw("strftime('%Y-%m', si.sale_date) = ?", '[$currentMonth]')  // Filter for current month
            ->groupBy(DB::raw("ps.partner_shops_name"), DB::raw("strftime('%Y-%m', si.sale_date)"))
            ->orderBy('ps.partner_shops_name')
            ->get();

        // Prepare the labels and data for the shop buying count chart (x = shop name, y = total quantity)
        $shopLabels = $shopData->pluck('shop_name')->toArray();  // x-axis: shop names
        $shopDataValues = $shopData->pluck('total_quantity')->toArray();  // y-axis: total quantities sold


        // Passing the sales data and predictions to the view
        return view('adm_dashboard', [
            'labels' => $labels,
            'data' => $data,
            'predictions' => $predictions,
            'shopLabels' => $shopLabels, // Shop names for the second chart
            'shopData' => $shopDataValues // Quantities sold for each shop
        ]);
    }
}
