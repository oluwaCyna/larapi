<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'first_name' =>  ['required','max:50', 'string'],
            'last_name' =>  ['required','max:50', 'string'],
            'phone' => ['required','max:11', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password'=> ['required','min:8', 'max:12', 'alpha_num'],
        ]);

        $hash_pass = Hash::make($request->password);
        User::create([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password'=> $hash_pass,
        ]);
        return response("User registered successfully");
    }
}
