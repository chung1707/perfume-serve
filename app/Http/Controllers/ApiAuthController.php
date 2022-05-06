<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;

class ApiAuthController extends Controller
{
    public function login(ApiLoginRequest $request){
        try {
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])){
                $user = User::where(['email' => $request->email])->with('role')->first();
                $token = $user->createToken('authToken')->plainTextToken;
                // $user->token = $user->createToken('authToken')->accessToken;
                Cart::firstOrCreate(['user_id' => $user->id]);
                return response()->json([
                    'token' => $token,
                    'user' => $user,
                    'type_token' => 'Bearer'
                ]);
            }
            return response()->json(['errors' => ['error'=>'Sai Email hoặc mật khẩu']], 401);
        }catch(Exception $e){
            return response()->json(['errors' => ['error'=>'Đã có lỗi hệ thống. Hãy thử lại sau!']], 401);
        }
    }
    public function register(ApiRegisterRequest $request){
        try{
            $user = new User;
            $user->fill($request->all());
            $user->password = Hash::make($request->password);
            $user->save();
            Cart::firstOrCreate(['user_id' => $user->id]);
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
                'type_token' => 'Bearer'
            ]);
        }catch(Exception $e){
            return response()->json(['errors' => ['error'=>'Đã có lỗi hệ thống. Hãy thử lại sau!']], 401);
        }
    }
    public function authUser(){
        $user = auth()->user();
        return response()->json($user);
    }
    public function logout(){
        // Remove all tokens
        try {
            auth()->user()->tokens()->delete();
            return response()->json(['message' => 'logged out!', 201]);

        }catch(Exception $e) {
            return response()->json(['loggoutError' => 'Đã có lỗi sảy ra. Hãy thử lại sau!', 401]);
        }
        // Remove the token that was use to authenticate the current request
        // auth()->user()->currentAccessToken()->delete();
        //Remove a specific token
        //auth()->user()->tokens()->where('id', $tokenId)->delete();
    }
}
