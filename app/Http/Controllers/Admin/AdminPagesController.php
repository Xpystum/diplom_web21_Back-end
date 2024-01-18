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
            $user = Auth::user();
            $layout = $this->layout;

            $adminCount = User::where('status', 'admin')->count();
            $userCount = User::where('status', 'user')->count();
            $banCount = User::where('status', 'ban')->count();
            $productGreenCount = Product::where('moderation_status', 'approved')->count();
            $productRedCount = Product::where('moderation_status', 'rejected')->count();
            $productCount = Product::where('moderation_status', 'in_review')->count();


            $menuHeader = view('widgets.menu-header', compact(
                                                        'layout', 
                                                        'user',
                                                        'productCount'
                                                    ));
    
            return view('pages.home', compact('layout', 
                                            'user',
                                            'menuHeader', 
                                            'adminCount', 
                                            'userCount', 
                                            'banCount', 
                                            'productGreenCount', 
                                            'productRedCount', 
                                            'productCount',
                                        ));
    }
    public function widgets(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $widgets = Widgets::all();
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', 
                        compact('layout', 
                                'user',
                                'productCount'
                            ));

        return view('pages.widgets', 
        compact('layout', 
                'user', 
                'menuHeader', 
                'widgets'
            ));
    }
    public function products(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $products = Product::with([
            'brand', 
            'model', 
            'category', 
            'color', 
            'organisation', 
            'drive_unit', 
            'transmission', 
            'fuel', 
            'body_type', 
            'imgCollection'
        ])
        ->where('moderation_status', 'in_review')
        ->orderBy('id')
        ->paginate(10);
        
        $layout = $this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.products', compact('layout', 'user', 'menuHeader', 'products', 'previousPageUrl', 'nextPageUrl', 'productCount'));
    }
    public function productsGreen(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $products = Product::with([
            'brand', 
            'model', 
            'category', 
            'color', 
            'organisation', 
            'drive_unit', 
            'transmission', 
            'fuel', 
            'body_type', 
            'imgCollection'
        ])
        ->where('moderation_status', 'approved')
        ->orderBy('id')
        ->paginate(10);

        $layout = $this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));
            
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsGreen', 
        compact('layout', 
                'user', 
                'menuHeader', 
                'products', 
                'previousPageUrl', 
                'nextPageUrl', 
                'productCount'
            ));
    }
    public function productsRed(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();

        $products = Product::with([
            'brand', 
            'model', 
            'category', 
            'color', 
            'organisation', 
            'drive_unit', 
            'transmission', 
            'fuel', 
            'body_type', 
            'imgCollection'
        ])
        ->where('moderation_status', 'rejected')
        ->orderBy('id')
        ->paginate(10);

        $layout = $this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsRed', compact(
                                            'layout', 
                                            'user', 
                                            'menuHeader', 
                                            'products', 
                                            'previousPageUrl', 
                                            'nextPageUrl',
                                            'productCount'
                                        ));
    }

    public function database(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));

        return view('pages.database', compact('layout', 'user', 'menuHeader', 'productCount'));
    }

    public function null(){
            $user = Auth::user();
            $layout=$this->layout;
            $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));

            return view('pages.test', compact('layout', 'user', 'menuHeader', 'productCount'));
    }

    public function user(){

        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $dbUsers = User::orderBy('id')->where('status', 'user')->paginate(10);
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));

        return view('pages.user', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productCount'));
    }

    public function userBan(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $dbUsers = User::orderBy('id')->where('status', 'ban')->paginate(10);
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));

        return view('pages.userBan', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productCount')); 
    }
    public function userAdmin(){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $dbUsers = User::orderBy('id')->where('status', 'admin')->paginate(10);
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));

        return view('pages.userAdmin', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productCount')); 
    }
    
    public function productCars($id){
        $user = Auth::user();
        $productCount = Product::where('moderation_status', 'in_review')->count();
        $dbUsers = User::all();

        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('layout', 'user', 'productCount'));
        $product = Product::with([
            'brand', 
            'model', 
            'category', 
            'color', 
            'organisation', 
            'drive_unit', 
            'transmission', 
            'fuel', 
            'body_type', 
            'imgCollection'
        ])
        ->find($id);

        return view('pages.productCars', compact('layout', 'user', 'menuHeader', 'dbUsers', 'product', 'productCount'));
            
    }
}
