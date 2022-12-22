<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // menangkap sebuah inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        //  mengirimkan inputan ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully',
        ];

        // response JSON 200
        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        //  menangkap inputan user
        $input = [
            'email' => $request->email,
            'password' => $request->password,
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