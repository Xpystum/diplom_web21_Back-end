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
            $productsApprovedCount = Product::where('moderation_status_id', 1)->count();
            $productsRejectedCount = Product::where('moderation_status_id', 2)->count();
            $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
            $productsSalesCount = Product::where('moderation_status_id', 4)->count();
            $productsWithdrawnCount = Product::where('moderation_status_id', 5)->count();
            $productsExpiredCount = Product::where('moderation_status_id', 6)->count();


            $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
    
            return view('pages.home', compact('layout', 
                                            'user',
                                            'menuHeader', 
                                            'adminCount', 
                                            'userCount', 
                                            'banCount', 
                                            'productsApprovedCount', 
                                            'productsRejectedCount', 
                                            'productsInReviewCount',
                                            'productsSalesCount',
                                            'productsWithdrawnCount',
                                            'productsExpiredCount',
                                        ));
    }
    public function widgets(){
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        $widgets = Widgets::all();
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('user','productsInReviewCount'));

        return view('pages.widgets', 
        compact('layout', 
                'user', 
                'menuHeader', 
                'widgets',
                'productsInReviewCount'
            ));
    }
    // .. ТОВАРЫ статусы:
    // идут показы
    public function productsApproved(){
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        
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
        ->where('moderation_status_id', 1)
        ->orderBy('id')
        ->paginate(10);
        $tableProduct= view('widgets.table-product', compact('products'));
        $layout = $this->layout;
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
            
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsApproved', 
        compact('layout', 
                'user', 
                'menuHeader', 
                'products', 
                'previousPageUrl', 
                'nextPageUrl', 
                'productsInReviewCount',
                'tableProduct'
            ));
    }
    // на модерации
    public function productsInReview(){
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
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
        ->where('moderation_status_id', 3)
        ->orderBy('id')
        ->paginate(10);
        
        $layout = $this->layout;
        $tableProduct= view('widgets.table-product', compact('products'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsInReview', compact('layout', 'user', 'menuHeader', 'products', 'previousPageUrl', 'nextPageUrl', 'productsInReviewCount', 'tableProduct'));
    }
    // не прошло модерацию
    public function productsRejected(){
        $layout = $this->layout;

        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        
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
        ->where('moderation_status_id', 2)
        ->orderBy('id')
        ->paginate(10);

        $tableProduct= view('widgets.table-product', compact('products'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsRejected', compact(
                                            'layout', 
                                            'user', 
                                            'menuHeader', 
                                            'products', 
                                            'previousPageUrl', 
                                            'nextPageUrl',
                                            'productsInReviewCount',
                                            'tableProduct'
                                        ));
    }
    // продано
    public function productsSales(){
        $layout = $this->layout;

        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        
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
        ->where('moderation_status_id', 4)
        ->orderBy('id')
        ->paginate(10);
        $tableProduct= view('widgets.table-product', compact('products'));
        
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsRejected', compact(
                                            'layout', 
                                            'user', 
                                            'menuHeader', 
                                            'products', 
                                            'previousPageUrl', 
                                            'nextPageUrl',
                                            'productsInReviewCount',
                                            'tableProduct'
                                        ));
    }
    // снято с продажи
    public function productsWithdrawn(){
        $layout = $this->layout;

        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        
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
        ->where('moderation_status_id', 5)
        ->orderBy('id')
        ->paginate(10);
        $tableProduct= view('widgets.table-product', compact('products'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsRejected', compact(
                                            'layout', 
                                            'user', 
                                            'menuHeader', 
                                            'products', 
                                            'previousPageUrl', 
                                            'nextPageUrl',
                                            'productsInReviewCount',
                                            'tableProduct'
                                        ));
    }
    // срок истек
    public function productsExpired(){
        $layout = $this->layout;

        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
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
        ->where('moderation_status_id', 6)
        ->orderBy('id')
        ->paginate(10);
        $tableProduct= view('widgets.table-product', compact('products'));
        
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
        
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();
        return view('pages.productsRejected', compact(
                                            'layout', 
                                            'user', 
                                            'menuHeader', 
                                            'products', 
                                            'previousPageUrl', 
                                            'nextPageUrl',
                                            'productsInReviewCount',
                                            'tableProduct'
                                        ));
    }

    public function database(){
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));

        return view('pages.database', compact('layout', 'user', 'menuHeader', 'productsInReviewCount'));
    }

    public function null(){
            $user = Auth::user();
            $layout=$this->layout;
            $productsInReviewCount = Product::where('moderation_status_id', 3)->count();

            $menuHeader = view('widgets.menu-header', compact( 'user', 'productsInReviewCount'));

            return view('pages.test', compact('layout', 'user', 'menuHeader', 'productsInReviewCount'));
    }

    public function user(){
        $layout=$this->layout;

        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        $dbUsers = User::orderBy('id')->where('status', 'user')->paginate(10);
        
        $tableUser= view('widgets.table-user', compact('dbUsers'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));

        return view('pages.user', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productsInReviewCount', 'tableUser'));
    }

    public function userBan(){
        $layout=$this->layout;

        $user = Auth::user();
        $dbUsers = User::orderBy('id')->where('status', 'ban')->paginate(10);
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();

        $tableUser= view('widgets.table-user', compact('dbUsers'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));

        return view('pages.userBan', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productsInReviewCount', 'tableUser')); 
    }
    public function userAdmin(){
        $layout=$this->layout;
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        $dbUsers = User::orderBy('id')->where('status', 'admin')->paginate(10);

        $tableUser= view('widgets.table-user', compact('dbUsers'));
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));

        return view('pages.userAdmin', compact('layout', 'user', 'menuHeader', 'dbUsers', 'productsInReviewCount', 'tableUser')); 
    }
    
    public function productCars($id){
        $user = Auth::user();
        $productsInReviewCount = Product::where('moderation_status_id', 3)->count();
        $dbUsers = User::all();

        $layout=$this->layout;
        $menuHeader = view('widgets.menu-header', compact('user', 'productsInReviewCount'));
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

        return view('pages.productCars', compact('layout', 'user', 'menuHeader', 'dbUsers', 'product', 'productsInReviewCount'));
            
    }
}
