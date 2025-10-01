<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(loginRequest $request)
    {
        $credentials = $request->only("email", "password");

        $token = auth("api")->attempt($credentials);

        if (!$token) {
            return response()->json(["message" => "unauthorized access!"], 401);
        }

        return response()->json([
            "access_token" => $token,
            "expires_in" => auth("api")->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        $newToken = auth("api")->refresh();

        return response()->json([
            "refresh_token" => $newToken,
            "expires_in" => auth("api")->factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        $user  = auth("api")->user();

        return response()->json($user);
    }

    public function logout()
    {
        auth("api")->logout();

        return response()->json(["message" => "logged out successfully"], 200);
    }
}
