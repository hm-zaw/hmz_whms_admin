<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Models\Member;
use Illuminate\Support\Arr;

Route::get('/adm-dsh', function () {
    return view('adm_dashboard', [
        "greeting" => "This is dashboard"
    ]);
});

Route::get('/customers', function (){
   return view('adm_customers');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::patch('/products/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::get('/customers', [ShopController::class, 'showCustomers']) -> name('customers.show');
Route::delete('/customers/{id}', [ShopController::class, 'destroy']) -> name('customers.destroy');
Route::patch('/customers/update', [ShopController::class, 'update']) -> name('customers.update');
Route::post('/customers', [ShopController::class, 'store']) -> name('customers.store');

// Route::get('/inventory', [InventoryController::class, 'data-show']) -> name('inventory.show');

Route::get('/inventory', function () {
    return view('adm_inventory', [
        "greeting" => "This is inventory page"
    ]);
});

Route::get('/orders', function (){
    return view('adm_orders', [
        "greeting" => "This is orders page"
    ]);
});

Route::get('/members', function (){
    return view('members', [
        "members" => Member::all()
    ]);
});

Route::get('/members/{id}', function($id)  {

    $member = Member::find($id);

    return view('member', [
        "member" => $member
    ]);
});

