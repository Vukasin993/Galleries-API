<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\JWTManager as JWT;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    public function login(Request $request) {
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            return response(null, 401);
        }

        return response()->json(compact('token'));
        
  
    }

    public function refreshToken() {
        return [
            'token' => auth('api')->refresh()
        ];
    }

    public function logout() {
        echo 'izlogovan';
        auth('api')->logout(true);
    }

    // public function register(Request $request){
    //     $validator = Validator::make($request->json()->all(), [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             'password' => 'required|string|min:6',
    //         ]);

    //         if($validator->fails()){
    //             return response()->json($validator->errors()->toJson(), 400);
    //         }

    //         $user = User::create([
    //             'name' => $request->json()->get('name'),
    //             'email' => $request->json()->get('email'),
    //             'password' => Hash::make($request->json()->get('password')),
    //         ]);

    //         $token = JWTAuth::fromUser($user);

    //         return response()->json(compact('user','token'), 201);

    // }
}
