<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StatusRequestHelper;
use App\Http\Controllers\Controller;
use App\Jobs\ProductsJob;
use App\Models\Product;
use App\Models\User;
use App\Models\Widgets;
use Database\Seeders\WidgetsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function auth(){
        $layout = 'auth';
        return view('pages.auth', compact('layout'));
    }
    public function productQueue(){
        
        $products = Product::with('brand', 'model', 'category','color', 'organisation', 'drive_unit', 'transmission', 'fuel', 'body_type', 'imgCollection')
            ->orderBy('id')
            ->get();

        foreach ($products as $product) {
            // Создание экземпляра задачи ProductsJob для каждого продукта
            $job = new ProductsJob($product);

            // Размещение задачи в очередь
            dispatch($job)->onQueue(queue:'product');
        }
    }
    
    public function showLoginForm()
    {
        return redirect()->route('auth');
    }
    
    public function updateProductStatus(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->moderation_status_id = $request->input('status');
        $product->save();

        return redirect()->back();


    }
    public function updateUserStatus(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->status = $request->input('status');
        $user->save();
        
        return redirect()->back();
    }
    public function updateWidgetStatus(Request $request, $id)
    {
        $widget = Widgets::find($id);
        $widget->status = $request->status;
        $widget->save();

        return redirect()->back();
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:4',
        ]);

        $credentials = [
            'email' => $validatedData['email'],
            'password' =>$validatedData['password'],
            'status' => 'admin',
        ];

        if (auth()->attempt($credentials)) {
            // Аутентификация прошла успешно, перенаправление на домашнюю страницу
            return redirect()->route('home');
        } else {
            // Неверные учетные данные, перенаправление обратно на страницу входа
            return redirect()->route('auth')->withErrors(['email' => 'Неверный адрес электронной почты или пароль']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth');
    }
    
    
}
