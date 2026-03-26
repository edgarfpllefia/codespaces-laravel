<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth; //Este modelo no es mio, ya viene instalado.



class AuthController extends Controller
{
    // Función para registrar usuarios

    public function register(Request $request){

    // Obtengo info de request, lo valido

        $validator = Validator::make($request ->all(),[
            'name' => 'required | string |max:100',
            'role' => 'requited | string | max:100in:admin,user',
            'email' => 'required | string |email | max:100 | unique:users',
            'password' => 'required | string | min:8 | confirmed',
        ]);


// Si no paso la validación:
    if($validator->fails()){
        return response() -> json($validator -> errors(), 422);
    }

    // Creo usuario si la paso
$user = User::create([
    'name' => $request -> get('name'),
    'role' => $request -> get('role'),
    'email' => $request -> get('email'),
    'password' => bcrypt($request->get('password')),
]);

// Devuelvo el usuario ya creado

return response()->json([
    'token' => $token,
    'user' => $user,
    'message' => 'Usuario registrado correctamente',
], 201);

    }
}
