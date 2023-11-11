<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sign\StoreRegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function registerUser(StoreRegisterRequest $request){
        $validated = $request->validated();

        $user = User::create([
            'email' => $request->input('email'),
            'password' => $request->input('pass'),
        ]);

        $user->save();
        
        return $validated;
    }
}
