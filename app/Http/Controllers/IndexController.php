<?php

namespace App\Http\Controllers;

use App\Models\Items_menu;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function menu_items()
    {
        return Items_menu::get();
    }
    public function products()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
