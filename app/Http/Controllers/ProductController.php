<?php

namespace App\Http\Controllers;
use App\Models\PartnerShop;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function store(Request $request)
    {
        try {
            $input = $request->validate([
                'model' => 'required|string',
                'brand' => 'required|string',
                'category' => 'required|string',
                'about' => 'nullable|string',
                'file_upload' => 'nullable|image|max:20480',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }


        // Get the latest product's serial number
        $latestProduct = Product::orderBy('id', 'desc')->first();
        $newSerialNumber = 'PR0000001';

        if ($latestProduct && preg_match('/^PR(\d+)$/', $latestProduct->product_serial_number, $matches)) {
            $lastNumber = (int) $matches[1];
            $newSerialNumber = 'PR' . str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        }

        $input['product_serial_number'] = $newSerialNumber;
        $imagePath = null;

        if($request -> hasFile('file_upload')){
            $imagePath = $request->file('file_upload')->store('uploads', 'public');
        }

        $input['product_image_url'] = $imagePath;
        // Create new product
        Product::create([
            'product_serial_number' => $input['product_serial_number'],
            'item_name' => $input['model'],
            'brand' => $input['brand'],
            'category' => $input['category'],
            'product_segment' => $input['about'],
            'product_image_url' => $input['product_image_url']
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function index()
    {
        // Retrieve the required product fields
        $products = Product::select('id', 'item_name', 'brand', 'category', 'product_segment', 'product_serial_number', 'product_image_url', 'created_at')->get();

        // Pass the products data to the view
        return view('adm_products', [
            "greeting" => "This is product page",
            "products" => $products
        ]);
    }

    public function update(Request $request)
    {
        try {
            $input = $request->validate([
                'product_id' => 'required|integer',
                'model' => 'required|string',
                'brand' => 'required|string',
                'category' => 'required|string',
                'about' => 'nullable|string',
                'file_upload' => 'nullable|image|max:20480',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }

        $product = Product::findOrFail($input['product_id']);

        if ($request->hasFile('file_upload')) {
            $imagePath = $request->file('file_upload')->store('uploads', 'public');
            $input['product_image_url'] = $imagePath;
        } else {
            $input['product_image_url'] = $product->product_image_url;
        }

        $product->update([
            'item_name' => $input['model'],
            'brand' => $input['brand'],
            'category' => $input['category'],
            'product_segment' => $input['about'],
            'product_image_url' => $input['product_image_url']
        ]);

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

}
