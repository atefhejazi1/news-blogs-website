<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");

        if (!auth()->attempt($credentials)) {
            return response()->json(["message" => "Invalid credentials"], 401);
        }

        $token = auth()->user()->createToken("auth_token")->plainTextToken;

        return response()->json(["access_token" => $token, "token_type" => "Bearer"]);
    }

    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json(["access_token" => $token, "token_type" => "Bearer"]);
    }




    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message" => "Logged out successfully"]);
    }
}
