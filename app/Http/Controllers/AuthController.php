<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){

    //Valida los datos que mete el usuario
    $validator = Validator::make($request->all(),[
        'name' => 'required | string | max:100',
        'role' => 'required | string | max:100 | in:admin,user',
        'email' => 'required | string | email | max:100 | unique:users',
        'password' => 'required | string | min:8 | confirmed',
    ]);


    //Si el validador NO pasa
    if($validator->fails()){
    return response()->json($validator->errors(), 422);
    }

    //Si pasa
    //Crea el usuario

    $user = User::create([
        'name' => $request->get('name'),
        'role' => $request->get('role'),
        'email' => $request->get('email'),
        'password' => bcrypt($request->get('password')),
    ]);

    return response()->json([
        'message' => 'User creado satisfactoriamente',
        'data' => $user,
    ], 201);



    }

    //Función para loguearnos

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required | string | email | max:100 ',
            'password' => 'required | string | min: 8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only([
            'email',
            'password'
        ]);

        //Validar las credenciales, usuario y contraseña, si no son correctas devolveré un error.

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'messaje' => 'Invalid credentials',
                ], 401);
            }
            return response() ->json([
                'message' => 'Usuario logueado correctamente',
                'token' => $token,
            ], 200);
        }catch(JWTException $e){
            return  response()->json([
                'error' => 'No se ha podido crear el token',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
