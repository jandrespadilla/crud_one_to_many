<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        return response()->json([
            'message' => 'me registre'
        ],Response::HTTP_OK);
    }

    public function login(Request $request){
        return response()->json([
            'message' => 'me loguie'
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
