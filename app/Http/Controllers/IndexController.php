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
        $productsTarget = Product::find($request->id);

        $productsRelevants = DB::table('products')
        ->whereNotIn('id', [$productsTarget->id])
        ->where(function (Builder $query) use ($productsTarget) {
            $query->where('mark', '=' , $productsTarget->mark);
        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->where('year', '=' , $productsTarget->year)
            ->orWhere(function (Builder $query) use ($productsTarget) {
                $query->whereBetween('year', [$productsTarget->year - 8, $productsTarget->year + 8]);
            });

        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->whereBetween('price', [$productsTarget->price - 2000000, $productsTarget->price + 2000000])
            ->orWhere(function (Builder $query) use ($productsTarget) {
                $query->whereBetween('price', [0, $productsTarget->price + 8000000]);
            });

        })->get(); 

        $ProductsAll = DB::table('products')
        ->whereNotIn('id', $productsRelevants->map(function ($item) {   
            return $item->id;
        }))
        ->whereNotIn('id', [$productsTarget->id])
        ->inRandomOrder()->take(30 - $productsRelevants->count())
       
        ->orderByRaw(
            "CASE 
                WHEN mark = '{$productsTarget->mark}' THEN 1 
                Else 100 END ASC  
            "
        )
        ->get();
        

        $productRelevanceResult = $productsRelevants->merge($ProductsAll);
        dd($productRelevanceResult);

        return $productRelevanceResult;

        
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
