<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Member;
use Illuminate\Support\Arr;

Route::get('/adm-dsh', function () {
    return view('adm_dashboard', [
        "greeting" => "This is dashboard"
    ]);
});

Route::get('/customers', function (){
   return view('adm_customers', [
    "greeting" => "This is customer page"
   ]);
});

Route::get('/products', function (){
    return view('adm_products', [
        "greeting" => "This is product page"
    ]);
});

Route::get('/inventory', function (){
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

Route::post('/products', [ProductController::class, 'store'])->name('product.store');
