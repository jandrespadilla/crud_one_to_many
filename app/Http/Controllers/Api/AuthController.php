<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        
       $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
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
      // validar el reques
      $credenciales=  $request->validate([
        "email" => ["required","email"],
        "password" => ["required"]
       ]);
      // loguearse
      
      if(Auth::attempt($credenciales)){
            $user=Auth::user();
            $token=$user->createToken('token')->plainTextToken;
            $cookie=cookie('cookie_token',$token,60*24);
            return response()->json([
                'token' => $token
            ],Response::HTTP_OK)->withoutCookie($cookie); 

      }else {
        # respuesta no autorizado
            return response([
                'message' => 'Credenciales no validas'
            ],Response::HTTP_UNAUTHORIZED);
      }


      //responder



    }

    public function userProfile(Request $request){
        return response()->json([
            'message' => 'userProfile Ok',
            'userData' => auth()->user()
        ],Response::HTTP_OK);        
    }
    public function logout( ){
        $cookie=Cookie::forget('cookie_token');
        return response([
            'message' => 'Logout ok'
        ],Response::HTTP_OK)->withoutCookie($cookie); 
    }

    public function allUser(Request $request){
     
    }

}
