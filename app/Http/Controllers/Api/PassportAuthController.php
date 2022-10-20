<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;


class PassportAuthController extends Controller
{
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
  
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            $auth = (object)['token' => $token];
            return new AuthResource($auth);
        } else {
            throw new AuthenticationException("Incorrect username or password");
        }
    }
 
    public function userInfo() 
    {
     $user = auth()->user();
     return new UserResource($user);
    }
}
