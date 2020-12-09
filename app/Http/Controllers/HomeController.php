<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Comentario;
use App\Models\Like;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //se pasan los modelos a la vista home
        $usuarios = User::all();
        $imagenes = Imagen::all();
        $comentarios = Comentario::all();
        $likes = Like::all();

        return view('home',compact('usuarios','imagenes','comentarios','likes'));
    }
}
