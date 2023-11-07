<?php

namespace App\Http\Controllers;

use App\Action\FilterModel;
use App\Models\CategoryProducts;
use App\Models\Items_menu;
use App\Models\Menu;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function menuItems(Request $request)
    {
        $items = Items_menu::all()->filter(function (Items_menu $item) use ($request) {
            return $item->menu->name_menu == $request->name_menu;
        })->map(function (Items_menu $item) {
            return $item;
        })->sortBy('id')->toArray();

        $data = [];
        foreach($items as $item){
            $data[] = $item;
        }

        return $data;
    }

    public function categoryProducts(Request $request){

        if($request->alias == null){
            return Product::get();
        }

        $products = Product::all()->filter(function (Product $product)  use ($request){
            return $product->category->alias == $request->alias;
        })->map(function (Product $product) {
            return $product;
        })->sortBy('id')->toArray();

        $data = [];
        foreach($products as $product){
            $data[] = $product;
        }

        return $data;
        
    }

    public function productItems(){
        return Product::all();
    }

    public function relevanceProduct(Request $request){
        // получаем ключевой товар
        $productsTarget = Product::find($request->id);

        $productsRelevants = (new Product)->productsRelevants($productsTarget);
        return $productsRelevants;

        
        #region comment Info
            // использование case для OrderBy
            // "CASE 
            // WHEN mark = '{$productsTarget->mark}' THEN 1 
            // WHEN price = '{$productsTarget->price}' THEN 1
            // Else 100 END ASC  
        

            //Получить по релевантности потом остальные (нужно соединять массивы)
            // $productRelevants = DB::table('products')->select('id')
            // ->whereRaw("mark = '{$productsTarget->mark}'");

            // $test = DB::table('products')
            // ->whereNotIn('id', $productRelevants)
            // ->get()->dd();


            //по марке
            // $ProdyctsRelevants = Product::where('mark', '=' , $productsTarget->mark)->get()->dd();\

            //год
            // $ProdyctsRelevants = Product::where('year', '=' , $productsTarget->year)->get()->dd();
            // $ProdyctsRelevants = Product::whereBetween('year', [$productsTarget->year - 5, $productsTarget->year + 5])->get()->dd();

            // цена
            // $ProdyctsRelevants = Product::whereBetween('price', [$productsTarget->price - 1000000, $productsTarget->price + 1000000])->get()->dd();
            // $ProdyctsRelevants = Product::whereBetween('price', [$productsTarget->price - 5000000, $productsTarget->price + 5000000])->get()->dd();
        #endregion
    }
}
