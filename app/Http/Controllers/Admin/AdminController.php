<?php

namespace App\Http\Controllers;

use App\Helpers\StatusRequestHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function authAdmin(Request $request){       
       
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
