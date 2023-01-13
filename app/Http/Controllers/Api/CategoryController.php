<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoras=Category::all();
        return response()->json([
            'results' => $categoras
        ],Response::HTTP_OK);

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $category = Category::create([
            'nombre' => $request->nombre
        ]);
        return response()->json([
            'results' => $category
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category= Category::findOrFail($id);
      return response()->json([
        'results' => $category
    ],Response::HTTP_OK);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $category= Category::findOrFail($id);


        $category->nombre =  $request->nombre;
        $category->save();
        return response()->json([
            'results' => $category
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::findOrFail($id)->delete();
        return response()->json([
            'results' => 'Se elimino el id'.$id
        ],Response::HTTP_OK);
    }
}
