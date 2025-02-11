<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_date',
        'product_id',
        'warehouse_branch',
        'opening_balance',
        'received',
        'dispatched',
        'closing_balance',
        'system_users_id'
    ];

    // Automatically update closing_balance
    public static function boot()
    {
        parent::boot();

        static::saving(function ($stock) {
            $stock->closing_balance = $stock->opening_balance + $stock->received - $stock->dispatched;
        });
    }
}
