<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sign\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Whoops\Handler\PlainTextHandler;

class AuthController extends Controller
{
    public function registerUser(StoreRegisterRequest $request)
    {       
        $request->validated();
        
        $user = User::create([
            'email' => $request->input('email'),
            'password' => $request->input('pass'),
        ]);

        // return $user->createToken('my_token');
        return ($user) ? true : false;
    }

    public function authUser(Request $request)
    {       
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return 'false';
        }

        if(Hash::check($request->password, $user->password)){

            $token = $user->createToken('my_token');
            return ['token' => $token->plainTextToken];
        }

        return 'false';
    }

    public function tokenUser(Request $request)
    {       
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);

        if(!$token)
            return false;
        
        if(!$token->tokenable)
            return false;

        $user = $token->tokenable;
        return true;
    }
}
