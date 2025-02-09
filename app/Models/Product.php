<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'item_name',
        'brand',
        'category',
        'description',
        'product_image_url',
        'product_serial_number'
    ];

    public function salesInvoices()
    {
        return $this->hasMany(SalesInvoice::class, 'product_id');
    }

    public function stockRecords()
    {
        return $this->hasMany(StockRecord::class, 'product_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->product_image_url
            ? asset('storage/' . $this->product_image_url)
            : asset('images/default-product.png'); // Default image fallback
    }
}
