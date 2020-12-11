@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificación de imagen</div>
                <div class="card-body">
                <img src="{{$imagen->ruta_imagen}}">
                </div>
            </div>
        </div>

    </div> 
    </div>
<div class="container">
    <form action="{{route('imagen.update', $imagen)}}" method="POST">
        @csrf 
        @method('PUT')
        <table class='table table-dark'>
            <tr>
                <td>
                    <label for="description">Introduce la nueva descripción de la imagen:</label>
                </td>
                <td>
                    <textarea id="description" class="form-control" name="description" cols="100" rows="10">{{$imagen->description}}</textarea>
                </td>
            <td>
                <button type="submit" value="Submit" >Actualizar</button>
            </td>
            </tr>
    </form>
</div>
@endsection