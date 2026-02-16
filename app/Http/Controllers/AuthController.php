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
    // Creo la funcion para registrar usuarios

    public function register(Request $request){

    // Parte A, validación de datos. Una vez que he obtenido la información del request, voy a validarlo.

        $validator = Validator::make($request ->all(),[
            'name' => 'required | string |max:100',
            'role' => 'requited | string | max:100in:admin,user',
            'email' => 'required | string |email | max:100 | unique:users',
            'password' => 'required | string | min:8 | confirmed',
        ]);


//Si NO consigo pasar la validación...
    if($validator->fails()){
        return response() -> json($validator -> errors(), 422);
    }

    //Si lo paso
    //Crear usuario
$user = User::create([
    'name' => $request -> get('name'),
    'role' => $request -> get('role'),
    'email' => $request -> get('email'),
    'password' => bcrypt($request->get('password')),
]);

//Devuelvo el usuario ya creado

return response()->json([
    'token' => $token,
    'user' => $user,
    'message' => 'Usuario registrado correctamente',
], 201);

    }
}
