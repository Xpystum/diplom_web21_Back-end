<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StatusRequestHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $layout = 'default';

    public function login(){

        // $data = DB::select('select * from posts');

        $layout = 'login';
        // $widget = view('widgets.vertical-wrapper',  compact('layout'));

        // if(Auth::check()){
        //     $user = Auth::user();
        // }
        return view('pages.login', compact('layout'));
    }
    public function home(){
        $layout=$this->layout;
        return view('pages.home', compact('layout'));
    }
    public function token(Request $request)  {       
        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('my_token');
            return [
                'token' => $token->plainTextToken, 
                'code' => StatusRequestHelper::code('success'),
                'token_name' => 'my_token'
            ];
        }

        return ['code' => StatusRequestHelper::code('access_denied')];
    }
}
