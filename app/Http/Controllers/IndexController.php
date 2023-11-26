<?php

namespace App\Http\Controllers;

use App\Action\FilterModel;
use App\Models\Brands;
use App\Models\CategoryProducts;
use App\Models\Items_menu;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
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
    public function allInfoProducts(Request $request)
    {  
        $data = Product::with('brand', 'model', 'category','color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->whereHas('category', function ($query) use ($request) {
                    $query->where('alias', $request->alias);
            })
            ->orderBy('id')
            ->get();
    
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
    public function users(){
        return User::all();
    }
    public function user(Request $request){
        return User::where('id', $request->id)->first();
    }
    public function products(){
        return Product::all();
    }
    public function product(Request $request){
        //return Product::where('id', $request->id)->first();

        $data = Product::with('brand','model','category','color','organisation','drive_unit','transmission','fuel','body_type','imgCollection')
            ->whereHas('category', function ($query) use ($request) {})
            ->where('id', $request->id)
            ->first();
    
        return $data;
    }

    public function brands(){
        return Brands::all();
    }
    
    public function itemsModels(Request $request)
    {
        
        $models = Product::all()->filter(function (Product $model) use ($request) {
            return $model->model->model_id == $request->id;
            
        })->map(function (Product $model) {
            
            return $model;
        })->sortBy('id')->toArray();

        $data = [];
        foreach($models as $model){
            $data[] = $model;
            
        }
        return $data;
    }

    public function relevanceProduct(Request $request){

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

