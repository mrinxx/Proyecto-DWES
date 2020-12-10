<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Validator;
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
    //     $input = $request->all();

    
    //    //$request->validate(['ruta_imagen' => 'required','description' => 'required',]);

    //     $validator_url = Validator::make($request->all(), [
    //         'ruta_imagen' => 'max:255|url'
    //     ]);

    //     if ($validator_url->fails()) {
    //         return redirect('/')->withErrors($validator_url)->with('error', 'El enlace de la imagen no es válido');
    //     }
    //     $validator_des = Validator::make($request->all(), [
    //         'description' => 'required'
    //     ]);

    //     if ($validator_des->fails()) {
    //         return redirect('/')->withErrors($validator_des)->with('error', 'Introduce una descripción válida');
    //     }


    //     Imagen::create($request->all());
    //     return redirect()->route('home')->with('success', 'Enlace creado correctamente.');
    }              
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
    //     $autor=$imagen->user->nombre;
    //  return view('includes.Imagen.view',compact('Imagen','autor'));

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
        return view('includes.imagen.editar',compact('imagen'));
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


        $validator_des = Validator::make($request->all(), [
            'description' => 'required'
        ]);

        if ($validator_des->fails()) {
            return redirect('/')->withErrors($validator_des)->with('error', 'Tiene que tener una descripción no vacia');
        }

        $imagen->description = $request->description;
        $imagen->save();
        return redirect()->route('home')->with('success', 'Se ha actualizado la imagen correctamente');
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
?>