@extends('layouts.app')

@section('content')

<!-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif -->

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
                        <b>Descripcion:</b><?php echo $imagen->description."<br>" ;?>
                        <b>Comentarios:</b><a href="{{route('comentarios.create',['imagen'=>$imagen, 'usuario'=>Auth::id()])}}" class="btn btn-dark" role="button" aria-pressed="true">Añadir comentario</a>
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