<?php

namespace App\Http\Controllers;

use App\Models\PartnerShop;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ShopController
{
    public function showCustomers(): View|Factory|Application
    {
        $shops = PartnerShop::all();

        return view('adm_customers', [
            'shops' => $shops
        ]);
    }

    public function update(Request $request)
    {
        try {
            $input = $request->validate([
                'id' => 'required|integer',
                'name' => 'required|string',
                'address' => 'required|string',
                'township' => 'required|string',
                'region' => 'nullable|string',
                'contact' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $shop = PartnerShop::findOrFail($input['id']);

        $shop->update([
            'partner_shops_name' => $input['name'],
            'partner_shops_address' => $input['address'],
            'partner_shops_township' => $input['township'],
            'partner_shops_region' => $input['region'],
            'contact_primary' => $input['contact']
        ]);

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $shop = PartnerShop::find($id);

        if ($shop) {
            $shop->delete();
            return redirect()->route('customers.show')->with('success', 'Shop deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    public function store(Request $request){
        try {
            $input = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'township' => 'required|string',
                'region' => 'nullable|string',
                'contact' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
        $input['password'] = Hash::make('pwd1234');
        // Create new product
        PartnerShop::create([
            'partner_shops_name' => $input['name'],
            'partner_shops_password' => $input['password'],
            'partner_shops_township' => $input['township'],
            'partner_shops_address' => $input['address'],
            'partner_shops_region' => $input['region'],
            'contact_primary' => $input['contact']
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }
}
