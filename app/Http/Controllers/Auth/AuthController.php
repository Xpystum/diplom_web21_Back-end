<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\StatusRequestHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sign\StoreRegisterRequest;
use App\Models\Favorites;
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

    public function addFavorite(Request $request){
        return $request->product_id;
    }

    public function favoritesUser(Request $request){
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);

        if(!$token)
            return false;
        
        if(!$token->tokenable)
            return false;

        $user = $token->tokenable;

        return Favorites::with('users', 'products')
        ->where('user_id', $user->id)
        ->get();
        
        
        
        //Favorites::where('user_id', $user->id)->get();
    }
    
}
