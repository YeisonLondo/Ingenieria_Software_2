<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = new User();
        $user-> name =$request->name;
        $user-> peso = $request->peso;
        $user-> altura = $request->altura;
        $user-> telefono = $request->telefono;
        $user-> direccion = $request->direccion;
        $user-> fecha_nacimiento = $request->fecha_nacimiento;
        $user-> email = $request->email;
        $user-> password = $request->password;
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json(['message' => 'Pelicula no encontrada'], 404);
        }
        $user-> name =$request->name;
        $user-> peso = $request->peso;
        $user-> altura = $request->altura;
        $user-> telefono = $request->telefono;
        $user-> direccion = $request->direccion;
        $user-> fecha_nacimiento = $request->fecha_nacimiento;
        $user-> email = $request->email;
        $user-> password = $request->password;
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json(['message' => 'User no encontrada'], 404);
        }
        $user->delete();
        return response()->json($id);
    }
}
