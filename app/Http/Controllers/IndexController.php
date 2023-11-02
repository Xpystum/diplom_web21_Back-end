<?php

namespace App\Http\Controllers;

use App\Action\FilterModel;
use App\Models\CategoryProducts;
use App\Models\Items_menu;
use App\Models\Menu;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function menuItems(Request $request, FilterModel $action)
    {
        return $action->handle($request->name_menu, (new Items_menu));
    }

    public function categoryProducts(Request $request, FilterModel $action){

        return $action->handle($request->alias, (new Product));
        
    }

    public function productItems(){
        return Product::all();
    }
}
