<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // First, truncate the table to avoid unique constraint violations
        Product::truncate();

        // Then insert your products
        Product::insert([
            [
                'brand' => 'Apple',
                'category' => 'Laptop',
                'item_name' => 'Apple MacBook Pro 14-inch',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'MBP14-2025-A1B2C3D4E5',
                'unit_price_mmk' => 1800000
            ],
            [
                'brand' => 'Microsoft',
                'category' => 'Desktop PC',
                'item_name' => 'Microsoft Surface Studio',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'MSF-STUDIO-5678XYZ123',
                'unit_price_mmk' => 850000
            ],
            [
                'brand' => 'HP',
                'category' => 'Laptop',
                'item_name' => 'HP EliteBook 840',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'HP840-G8-12AB34CD56',
                'unit_price_mmk' => 800000
            ],
            [
                'brand' => 'Epson',
                'category' => 'Printer',
                'item_name' => 'Epson EcoTank ET-3850',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'EPS-ET3850-QWERT12345',
                'unit_price_mmk' => 1200000
            ],
            [
                'brand' => 'WD',
                'category' => 'Storage Device',
                'item_name' => 'WD Black SN850X 1TB SSD',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'WDB-SN850X1TB-X123Y456Z',
                'unit_price_mmk' => 80000
            ],
            [
                'brand' => 'MyanTech',
                'category' => 'Storage Device',
                'item_name' => 'IT Pouk Sa 100TB SSD',
                'product_image_url' => null,
                'product_segment' => 'Consumer',
                'product_serial_number' => 'ITPS-SN850X1TB-X123Y456Z',
                'unit_price_mmk' => 800000
            ]
        ]);
    }
}
