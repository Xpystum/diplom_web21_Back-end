<?php 
    
    namespace App\Helpers;
    // success = 201
    // access_denied = 403

    class StatusRequestHelper{

        static $code;

        static function code($status){
            switch($status){
                case 'success':  self::$code = 201; break;
                case 'access_denied':  self::$code = 403; break;
            }
            return self::$code;
        }

    }