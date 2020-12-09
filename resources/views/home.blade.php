@extends('layouts.app')

@section('content')
@foreach($imagenes as $imagen)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo "<img src=".$imagen->usuario->imagen."> ".$imagen->usuario->nombre_usuario ?></div>
                <div class="card-body">
                <?php echo "<br><img src=".$imagen->ruta_imagen.">"; ?>;
                        <hr>
                        <b>Descripcion:</b><?php echo $imagen->description."<br>" ;?>
                        <b>Comentarios:</b> @foreach($imagen->comentarios as $comentario)
                        <?php echo "<br><b>".$comentario->usuario->nombre_usuario.":</b>";
                            echo $comentario->contenido_comentario ;?>
                        @endforeach
                        <?php echo "<br>" ;?>
                        <b>Likes:</b>{{count($imagen->likes)}}
                        @can('isAdmin')
                        @include('user.admin')
                
                    @elsecan('isManager')
                        @include('user.manager')
                    @else
                        @include('usuarios.usuario')
                    @endcan

                </div>
            </div>
        </div>
     

        <!-- <div class="container">
        @can('isAdmin')
                @include('user.admin')
               
                    @elsecan('isManager')
                        @include('user.manager')
                    @else

                        @include('usuarios.usuario')
                    @endcan


    </div> -->
    </div>
</div>
@endforeach
@endsection