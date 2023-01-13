<?php

namespace App\Http\Controllers\Api;
use App\Models\Cuadros;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CuadrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuadros=Cuadros::all();
        return view('welcome',compact('cuadros'));

        /*return response()->json([
            'results' => $cuadros
        ],Response::HTTP_OK);*/

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /**/ $request->validate([
            'nombre' => 'required|string',
            "category_id" => "required"
        ]);
        $category= Category::findOrFail($request->category_id);


       $cuadros=$category->cuadros()->create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion    
          //  'category_id' => $category->id
        ]); /**/
    



        return response()->json([
            'results' => $cuadros
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
        $cuadros= Cuadros::findOrFail($id);
        return response()->json([
          'results' => $cuadros
      ],Response::HTTP_OK);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cuadro)
    {
                /**/ $request->validate([
                    'nombre' => 'required|string',
                    "category_id" => "required"
                ]);
                $category= Category::findOrFail($request->category_id);


                $cuadros=$category->cuadros()->where('id',$id_cuadro)->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion ,   
                    'category_id' => $request->category_id
                ]); /**/


                return response()->json([
                    'nessage' => 'Producto Actualizado',
                    'results' => $cuadros
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
        $cuadros= Cuadros::findOrFail($id)->delete();
        return response()->json([
            'results' => 'Se elimino el id'.$id
        ],Response::HTTP_OK);
    }
}
