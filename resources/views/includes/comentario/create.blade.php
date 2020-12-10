@extends('layouts.app')
@section('title','Crear Comentario')
@section('content')
    <h1>Creación de comentario</h1>
    <form action="{{route('comentarios.store',['imagen'=>$imagen, 'usuario'=>$usuario])}}" method="POST">
        @csrf 
        @method('POST');
        <label>Contenido:</label>
        <input type="textarea" name="contenido" placeholder="Inserta tu comentario aquí...">
        <button>Enviar formulario</button>
    </form>
@endsection