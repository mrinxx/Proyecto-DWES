<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    $imagenes = Imagen::all();
    foreach($imagenes as $imagen){
    echo "<br><img src=".$imagen->ruta_imagen.">";
    echo "<br>".$imagen->description;
    echo "<br>".$imagen->usuario->nombre." ".$imagen->usuario->apellido;
    //Si la imagen tiene asociado algun comentario
    if(count($imagen->comentarios) >= 1){
        echo '<h4>Comentarios:</h4>';
    foreach($imagen->comentarios as $comentario){
        echo "#>".$comentario->usuario->nombre.' '.$comentario->usuario->apellido.":";
        echo $comentario->contenido_comentario."<br>";
        }
    }
        echo "<br>@>LIKES: ".count($imagen->likes);
        echo "<hr>";
    }});
