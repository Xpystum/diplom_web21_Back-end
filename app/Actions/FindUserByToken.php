<?php

namespace App\Actions;

use Illuminate\Http\Request;

class FindUserByToken
{
    public function handler($tokenRequest){

        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($tokenRequest);

        if($token){
            
            return $token->tokenable;
            
        }else{

            return null;

        }
        
    }

}