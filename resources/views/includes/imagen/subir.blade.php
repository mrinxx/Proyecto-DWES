@extends('layouts.app')

@section('content')


<form action="{{route('imagen.store',['usuario'=>intval(Auth::user()->id,10)])}}" method="POST">
        @csrf 
        @method('POST')
  <div class="form-group">
    <label for="ruta_imagen">Ruta de la imagen</label>
    <input type="text" class="form-control" id="ruta_imagen" name="ruta_imagen" placeholder="Introduce la ruta de la imagen">
  </div>
  <div class="form-group">
    <label for="description">Descripción de la imagen</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Introduce la descripción de la imagen">
  </div>

  <button type="submit" class="btn btn-success">Subir</button>
</form>

@endsection