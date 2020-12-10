<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Imagen;
class ImagenController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Imagen::all()->reverse();
        return view('welcome', compact( 'paths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

    
     //   $request->validate(['path' => 'required','description' => 'required',]);

        // $validator_url = Validator::make($request->all(), [
        //     'path' => 'required|max:255|url'
        // ]);

        // if ($validator_url->fails()) {
        //     return redirect('home')->withErrors($validator_url)->with('error', 'Tiene que ser una una url.');
        // }
        // $validator_des = Validator::make($request->all(), [
        //     'description' => 'required'
        // ]);

        // if ($validator_des->fails()) {
        //     return redirect('home')->withErrors($validator_des)->with('error', 'Tiene que tener una descripción no vacia');
        // }


        // Imagen::create($request->all());
        // return redirect()->route('home')->with('success', 'Enlace creado correctamente.');
    }              
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        $autor=$imagen->user->name;
     return view('includes.Imagen.view',compact('Imagen','autor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagen $imagen)
    {
        //
        return view('includes.Imagen.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        if( $imagen->delete()){
            $mensaje =  'Enlace eliminado correctamente la imagen con id:'. $imagen->id;
            return redirect()->route('home')->with('success', $mensaje);
        }else{
            return redirect()->route('home')->with('error', "No se ha podido borrar la imagen con id: ". $imagen->id);
        }

     
}
}
