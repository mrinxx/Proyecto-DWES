
<a href="{{route('imagen.edit', $imagen)}}">
    <button class="btn btn-warning">
        <i color="black">Editar</i>
    </button>
   
</a>
<form action="{{route('imagen.destroy', $imagen->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" title="delete" class="btn btn-danger">
        <i color="white">Borrar</i>
    </button>
</form>