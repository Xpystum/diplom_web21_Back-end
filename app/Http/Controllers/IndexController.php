<?php

namespace App\Http\Controllers;

use App\Action\FilterModel;

use App\Models\BodyType;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceChat;
use App\Models\Avatar;

use App\Models\Brands;
use App\Models\CategoryProducts;
use App\Models\Color;
use App\Models\DriveUnit;
use App\Models\Fuel;
use App\Models\Items_menu;
use App\Models\Menu;
use App\Models\Models;
use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewImgCollection;
use App\Models\Transmission;
use App\Models\User;
use App\Models\Widgets;
use App\Models\UserReview;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;
use Ramsey\Uuid\Uuid;

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
    public function widgets(){
        return Widgets::all();
    }

    public function user(Request $request){

        $token = PersonalAccessToken::findToken($request->my_token)->tokenable_id;
        $user = User::where('id', $token)->first();

        return (new UserResource($user))->resolve();

        // return (new UserResource(User::findOrFail($request->id)))->resolve();

    }
    public function products(){
        return Product::all();
    }
    public function addproduct(Request $request){
        $valid = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required',
            'userId' => 'required',
            // 'color' => 'required',
            'fuel' => 'required',
            'power' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'brand_id'=> $valid['brand'],
            'model_id'=> $valid['model'],
            'year' => $valid['year'],
            'price' => $valid['price'],
            'user_id' => $valid['userId'],
            // 'color_id' => $color->id,
            'fuel_id' => $valid['fuel'],
            'power' => $valid['power'],
            'moderation_status_id' => $valid['status'],
            'category_id' => 1,
        ];
        // Создание новой записи в базе данных

        $maxPrice = Product::where('brand_id', $valid['brand'])->where('model_id', $valid['model'])->where('moderation_status_id', 1)->max('price');
        if($maxPrice * 1.5 > $data['price']){
            $val = $maxPrice * 1.5." > ".$data['price'].' yes';
            $data['moderation_status_id'] = 3;
        }
        else{
            $val = $maxPrice * 1.5." > ".$data['price'].' no';
            $data['moderation_status_id'] = 2; 
        }

        Product::create($data);

        return response()->json([
            'message' => 'Успешно создан',
            'data' => $data, 
            'valid' => $val,
        ]);
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

   
    public function models(){
        return Models::all();
    }
    public function bodyType(){
        return BodyType::all();
    }
    public function fuel(){
        return Fuel::all();
    }
    public function transmission(){
        return Transmission::all();
    }
    public function driveUnit(){
        return DriveUnit::all();
    }
    

    
}

