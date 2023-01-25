<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        
       $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);
       
        //alta de usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //respuesta de la registracion
   
        return response()->json([
            'message' => $user
        ],Response::HTTP_OK);        
    }

    public function login(Request $request){
      
    }

    public function userProfile(Request $request){
 
    }
    public function logout( ){
 
    }

    public function allUser(Request $request){
     
    }

}
