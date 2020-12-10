@extends('layouts.app')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert"><p> <strong> {{ Session::get('success') }} </strong> </p></div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert"><p> <strong> {{ Session::get('error') }} </strong> </p></div>
@endif


@foreach($imagenes as $imagen)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo "<img src=".$imagen->usuario->imagen."> ".$imagen->usuario->nombre_usuario ?></div>
                <div class="card-body">
                <?php echo "<br><img src=".$imagen->ruta_imagen.">"; ?>;
                        <hr>
                        @can('isAdmin')
                            @include('usuarios.usuario')
                            @include('usuarios.admin')
                        @elsecan('isManager')
                            @include('usuarios.manager')
                        @else
                            @include('usuarios.usuario')
                    @endcan
                    <br>
                        <p><b>Descripcion:</b></p><?php echo $imagen->description."<br>" ?>
                        <b>Comentarios:</b>
                        <form action="{{route('comentarios.store',['imagen'=>$imagen, 'usuario'=>Auth::user()->id])}}" method="POST">
                                @csrf 
                                @method('POST')
                                <input type="textarea" name="contenido" placeholder="Inserta tu comentario aquí...">
                                <button class="btn btn-info">Comentar</button>
                            </form>
                         @foreach($imagen->comentarios as $comentario)
                        <?php echo "<br><b>".$comentario->usuario->nombre_usuario.":</b>";
                            echo $comentario->contenido_comentario ;?>
                        @endforeach
                        </br>
                        
                        <br><b>Likes:</b>{{count($imagen->likes)}}
                </div>
            </div>
        </div>

    </div> 
    </div>
@endforeach
@endsection