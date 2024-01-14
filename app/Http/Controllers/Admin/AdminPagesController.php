<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Widgets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    protected $layout = 'default';

    public function home(){
        if(Auth::check()){
            $user = Auth::user();
            $layout = $this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));
    
            return view('pages.home', compact('layout', 'user', 'menuHeader'));
        }
        else{
            return redirect()->route('auth');
        }
    }
    public function widgets(){
        if(Auth::check()){
            $user = Auth::user();

            $widgets = Widgets::all();
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));

            return view('pages.widgets', compact('layout', 'user', 'menuHeader', 'widgets'));
        }
        else{
            return redirect()->route('auth');
        }  
    }
    public function products(){
        if (Auth::check()) {
            $user = Auth::user();
            $products = Product::with('brand', 'model', 'category', 'color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->where('moderation_status', 'in_review')
            ->orderBy('id')->paginate(10);
            $layout = $this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));
            
            $previousPageUrl = $products->previousPageUrl();
            $nextPageUrl = $products->nextPageUrl();
            return view('pages.products', compact('layout', 'user', 'menuHeader', 'products', 'previousPageUrl', 'nextPageUrl'));
        } else {
            return redirect()->route('auth');
        }
    }
    public function productsGreen(){
        if (Auth::check()) {
            $user = Auth::user();
            $products = Product::with('brand', 'model', 'category', 'color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->where('moderation_status', 'approved')
            ->orderBy('id')->paginate(10);

            $layout = $this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));
            
            $previousPageUrl = $products->previousPageUrl();
            $nextPageUrl = $products->nextPageUrl();
            return view('pages.productsGreen', compact('layout', 'user', 'menuHeader', 'products', 'previousPageUrl', 'nextPageUrl'));
        } else {
            return redirect()->route('auth');
        }
    }
    public function productsRed(){
        if (Auth::check()) {
            $user = Auth::user();
            $products = Product::with('brand', 'model', 'category', 'color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->where('moderation_status', 'rejected')
            ->orderBy('id')->paginate(10);

            $layout = $this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));
            
            $previousPageUrl = $products->previousPageUrl();
            $nextPageUrl = $products->nextPageUrl();
            return view('pages.productsRed', compact('layout', 'user', 'menuHeader', 'products', 'previousPageUrl', 'nextPageUrl'));
        } else {
            return redirect()->route('auth');
        }
    }
    public function database(){
        if(Auth::check()){
            $user = Auth::user();
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));

            return view('pages.database', compact('layout', 'user', 'menuHeader'));
        }
        else{
            return redirect()->route('auth');
        }  
    }
    public function null(){
        if(Auth::check()){
            $user = Auth::user();
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user'));

            return view('pages.test', compact('layout', 'user', 'menuHeader'));
            
        }
        else{
            return redirect()->route('auth');
        }  
    }
    public function user(){
        if(Auth::check()){
            $user = Auth::user();
            $dbUsers = User::orderBy('id')->where('status', 'user')->paginate(10);
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'dbUsers'));

            return view('pages.user', compact('layout', 'user', 'menuHeader', 'dbUsers'));
            
        }
        else{
            return redirect()->route('auth');
        }  
    }
    public function userBan(){
        if(Auth::check()){
            $user = Auth::user();
            $dbUsers = User::all()->where('status', 'ban')->sortBy('id');
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'dbUsers'));

            return view('pages.userBan', compact('layout', 'user', 'menuHeader', 'dbUsers'));
            
        }
        else{
            return redirect()->route('auth');
        }  
    }
    public function userAdmin(){
        if(Auth::check()){
            $user = Auth::user();
            $dbUsers = User::all()->sortBy('id');
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'dbUsers'));

            return view('pages.userAdmin', compact('layout', 'user', 'menuHeader', 'dbUsers'));
            
        }
        else{
            return redirect()->route('auth');
        }  
    }
    
    public function productCars($id)
    {
        if(Auth::check()){
            $user = Auth::user();
            $dbUsers = User::all();

            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'dbUsers'));
            $product = Product::with('brand', 'model', 'category','color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->find($id);

            return view('pages.productCars', compact('layout', 'user', 'menuHeader', 'dbUsers', 'product'));
            
        }
        else{
            return redirect()->route('auth');
        }
    }
}
