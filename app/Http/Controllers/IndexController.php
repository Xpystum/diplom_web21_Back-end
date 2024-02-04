<?php

namespace App\Http\Controllers;

use App\Action\FilterModel;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceChat;
use App\Models\Avatar;
use App\Models\Brands;
use App\Models\CategoryProducts;
use App\Models\Items_menu;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        return (new UserResource(User::findOrFail($request->id)))->resolve();
        
    }
    public function products(){
        return Product::all();
    }
    public function product(Request $request){

        //TODO рассмотреть возможность сделать всё через 1 запрос.
        $product = Product::with('brand','model' ,'category','color','organisation','drive_unit','transmission','fuel','body_type','imgCollection')
            ->where('id', $request->id)
            ->first();
        
        return $data = [
            'product' => $product,  
            'user' => new UserResourceChat($product->user),
        ];
        
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
//ОТЗЫВЫ
    public function reviews(){
        return Review::all();
    }

    public function review(Request $request){
        $data =  Review::with('brand','model','body_type','fuel','transmission','drive_unit','review_img_collection',)
            ->where('id', $request->id)
            ->first();
         return $data;          
    }

    public function allInfoReviews(){
        $data =  Review::with(
            'brand',
            'model',
            'body_type', 
            'fuel',
            'transmission',
            'drive_unit',
            'review_img_collection',
            )
            ->orderBy('id')
            ->get();
         return $data;          
    }
}

