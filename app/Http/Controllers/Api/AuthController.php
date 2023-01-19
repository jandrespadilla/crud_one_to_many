<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        //validacion de los datos
   /*     $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);
 */
        //alta de usuario
       // $user = new User();
       // $user->name = $request->name;
      //  $user->email = $request->email;
       // $user->password = $request->password;
       // $user->save();
        //respuesta de la registracion
        return response()->json([
            'message' => $request->email
        ],Response::HTTP_OK);
    }

    public function login(Request $request){
        return response()->json([
            'message' => $request
        ],Response::HTTP_OK);
    }

    public function userProfile(Request $request){
        return response()->json([
            'message' => 'me registre'
        ],Response::HTTP_OK);
    }
    public function logout( ){
        return response()->json([
            'message' => 'me registre'
        ],Response::HTTP_OK);
    }

    public function allUser(Request $request){
        return response()->json([
            'message' => 'me registre'
        ],Response::HTTP_OK);
    }

}
