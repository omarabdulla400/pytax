<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function user()
    {
        return Auth::User();
    }

    public function register(Request $request)
    {
        $user = User::create([

            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    public function login(Request $request)
    {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $message = [
                "status" => 403,
            ];
            return response(json_encode($message));
        }

        $user = Auth::User();

        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('userToken', $token, 60 * 24);
        Auth::login( $user);

        $message = [
            "status" => 200,
        ];

        return response(json_encode($message))->withCookie($cookie);
    }

    public function logout(Request $request)
    {

        $cookie = Cookie::forget('userToken');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $message = [
            "status" => 200,
        ];
        return response(json_encode($message))->withCookie($cookie);
    }
}
