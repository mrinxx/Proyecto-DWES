

<form action="{{ route('imagen.destroy', $imagen->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" title="delete" style="border: none; background-color:transparent;">
        <i class="fas fa-trash fa-lg text-danger">Borrar</i>
    </button>
</form>