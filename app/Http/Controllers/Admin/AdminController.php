<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StatusRequestHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function login(Request $request){   
        return view('login');
    }
    public function home(Request $request){   
        return view('home');
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
