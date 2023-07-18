<?php

namespace App\Helper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Exceptions\Handler;

class JWTToken{

    public static function CreateToken($userEmail):string{

        $key= env('JWT_KEY');

        $payload=[
            'iss'=>'laravel_token',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'userEmail'=> $userEmail
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    // passwordword reset token
    public static function CreateTokenForSetPassword($userEmail):string{

        $key= env('JWT_KEY');

        $payload=[
            'iss'=>'laravel_token',
            'iat'=>time(),
            'exp'=>time()+60*10,
            'userEmail'=> $userEmail
        ];

        return JWT::encode($payload, $key, 'HS256');
    }



    public static function VerifyToken($token):string{


        try {
        $key= env('JWT_KEY');
        $decode= JWT::decode( $token, new Key($key, 'HS256'));
        return $decode->userEmail;
       }

       catch (Exception $e) {
        return 'unauthorized';
       }

    }

}