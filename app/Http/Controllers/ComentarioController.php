<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Imagen $imagen, User $usuario)
    {
        //
        return view('includes.comentario.create',compact('imagen','usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'usuario' => 'required',
            'imagen' => 'required',
            'contenido'=> 'required'
        ]);


        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->with('error', 'El comentario no ha podido ser enviado');
        }


        $comentario = new Comentario();

        $comentario->usuario_id = $request->usuario;
        $comentario->imagen_id = $request->imagen;
        $comentario->contenido_comentario= $request->contenido;

         $comentario->save();

         return redirect()->route('home')->with('success', 'Se ha actualizado la imagen correctamente');
    }              
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
    //     $autor=$comentario->user->nombre;
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {

//
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //

     
}
}
?>


