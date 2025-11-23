<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $payload = [
                'sub' => $user->id,
                'email' => $user->email,
                'iat' => time(),
                'exp' => time() + 3600 // 1 hour expiry
            ];
            $jwt = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
            return response()->json(['token' => $jwt]);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
