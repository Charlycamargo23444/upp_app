<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    //
// {}

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'data.attributes.name' =>['required','string','min:4'],
            'data.attributes.email' => ['required','email','lowercase','exists:users,email'],
            'data.attributes.password' => ['required','confirmed'],

           // 'data.attributes.password' => [
           //     'requered',
           //     'string',
           //     'min:8',
           //     'regex:/[a-z]',  //Al menos una letra minúscula
           //     'regex:/[A-Z]',  //Al menos una letra mayúscula
           //     'regex:/[0-9]',  //Al menos una letra número
           //     'regex:/[@$!%*#?&]',  //Al menos una carácter especial
           //],
        ]);

        //almacenar los datos

        $user = User::Create([
            'name' => $request->input('data.attributes.name'),
            'email' => $request->input('data.attributes.email'),
            'password' => $request->input(('data.attributes.password'))
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {

    }


}
