<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // Remove Token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            // return respone JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil'
            ], 200);
        }
    }
}
