<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class InventoryController
{
    public static function data_show(): View|Factory|Application
    {

        return \view('adm_inventory', []);
    }
}
