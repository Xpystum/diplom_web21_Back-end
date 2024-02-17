<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewImgCollection;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
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
    
    public function addReviewImg(Request $request){
        $data = [];

        $model = new ReviewImgCollection();
        $model->id = $request->id;
        $model->review_id = $request->review_id;
        $model->resource = $request->resource;


        $model->save();

        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);

    }
    public function saveImg(Request $request){
        // $data = [];
        // $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:102048000000000',
    
        //    ]);
        //  $path = $request->file('image')->store('public/images');
        $path = $request->file('image')->store('images');
        // $request->file('file')->store('images');
        // Storage::disk('local')->put('images', 'Contents');
        // $save = new ReviewImgCollection();

        // $save->path = $path;

        // $save->save();
        // $model = new ReviewImgCollection();
        // $model->id = $request->id;
        // $model->review_id = $request->review_id;
        // $model->resource = $request->resource;


        // $model->save();
        
        // return redirect('app/save-img')->with('status', 'Изображение было загружено');
    
        // return $data;
        // return response()->json($path, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        // JSON_UNESCAPED_UNICODE);
        return $path;

        
    }

    public function addReview(Request $request)
    {       
        $data = [];
        $model = new Review();
        $model->id = $request->id;
        $model->user_id = $request->user_id;
        $model->brand_id = $request->brand_id;
        $model->model_id = $request->model_id;
        $model->steering_wheel = $request->steering_wheel;
        $model->body_type_id = $request->body_type_id;
        $model->year = $request->year;
        $model->engine_capacity = $request->engine_capacity;
        $model->power = $request->power;
        $model->fuel_id = $request->fuel_id;
        $model->transmission_id = $request->transmission_id;
        $model->drive_unit_id = $request->drive_unit_id;        
        $model->sale_year = $request->sale_year;        
        $model->mileage = $request->mileage;        
        $model->main_img = $request->main_img;        
        $model->review = $request->review;
        $model->raiting = $request->raiting;
        
        $model->save();

        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

}
