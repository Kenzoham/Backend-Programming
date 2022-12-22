<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    # membuat register
    public function register(Request $request){
        
        $input = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ];

        
        // Menginput data ke table user
        $user = User::create($input);

        $data =[
            'massege'=>"User is craeted succesfully"
        ];

        // response JSON 200
        return response()->json($data, 200);
    }

    public function login(Request $request){
        // menangkap inputan user
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // Melakukan autentikasi
        if (Auth::attempt($input)) {
            // membuat token
            $token = Auth::user()->createToken('auth_token');

            $data = [
                'message' => "Login Succesfully",
                'token' => $token->plainTextToken
            ];

            // mengembalikan response JSON
            return response()->json($data, 200);
        }else {
            $data = [
                'message' => "Email or Password is wrong"
            ];

            return response()->json($data, 401);
        }
        
    }
}
