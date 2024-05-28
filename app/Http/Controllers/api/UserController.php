<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResources;
use App\Http\Resources\UserCollection;
use App\Models\User;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return UserCollection::make(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        $request->validate([
            'data.attributes.name'=> ['required', 'min:4'],
            'data.attributes.email'=> ['required', 'email'],
            'data.attributes.password'=> ['required'],
        ]);

        //alamacenar datos
        $user = User::create([
            'name' => $request->input('data.attributes.name'),
            'email' => $request->input('data.attributes.email'),
            'password' => $request->input('data.attributes.password'),
        ]);
        $user->save();

        return UserResources::make($user);
        return response()->json(null, 207);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return new UserResources($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
        //
        $user->update();
        if ($request->isMethod('put')) {
            // Actualización completa con PUT
            $user->update($request->all());
        } elseif ($request->isMethod('patch')) {
            // Actualización parcial con PATCH
            $user->update($request->only(['name', 'email'])); // Actualiza solo los campos name y email
        }
        return response()->json($user, 205);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //Elimina el usuario
        $user->delete();

        return response()->json(null, 204);
    }
}
