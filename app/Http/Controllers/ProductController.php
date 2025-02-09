<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function store(Request $request)
    {

        $input = $request->validate([
            'model' => 'required|string',
            'brand' => 'required|string',
            'category' => 'required|string',
            'about' => 'nullable|string',
            'file_upload' => 'nullable|image|max:20480',
        ]);

        // Get the latest product's serial number
        $latestProduct = Product::latest()->first();
        $newSerialNumber = 'PR0000001';

        if ($latestProduct) {
            $lastNumber = (int) substr($latestProduct->serial_number, 2);
            $newSerialNumber = 'PR' . str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        }

        $input['product_serial_number'] = $newSerialNumber;
        $imagePath = null;

        if($request -> hasFile('file_upload')){
            $imagePath = $request->file('file_upload')->store('uploads', 'public');
        }

        dd($imagePath);

        $input['product_image_url'] = $imagePath;

        // Create new product
        Product::create([
            'product_serial_number' => $input['product_serial_number'],
            'item_name' => $input['model'],
            'brand' => $input['brand'],
            'category' => $input['category'],
            'description' => $input['about'],
            'product_image_url' => $input['product_image_url']
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

}
