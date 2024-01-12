<?php 

namespace App\Actions;

use Illuminate\Http\Request;

class CheckTokenUser
{
    public function handler($tokenRequest){

        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($tokenRequest);
  
        if(!$token)
            return false;
        
        if(!$token->tokenable)
            return false;
     
        return true;
    }

}