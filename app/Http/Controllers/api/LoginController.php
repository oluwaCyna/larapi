<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password'=> ['required','min:8', 'max:12', 'alpha_num'],
        ]);

        try
        {
            if(Auth::attempt($request->only(['email', 'password']))) {
                $user = Auth::user();
                $access_token = $user->createToken('login')->accessToken;
                return response([
                    'access_token' => $access_token,
                    'user' => $user
                ], 200);
            }else {
                return response('Invalid credentials', 401);
            }
        }
        catch (Exception $exception)
        {
            return response([
                'message'=> $exception->getMessage(),
            ], 400);
        }
    }

    public function user()
    {
        return User::all();
    }

    public function unitUser($id)
    {
        return User::where('id', $id)->get();;
    }
}

