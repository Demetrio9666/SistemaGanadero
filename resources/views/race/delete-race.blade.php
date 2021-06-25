<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{route('confRaza.destroy',$i->id)}}" method="POST">
            @csrf
            @method('DELETE')   
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminacion de Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                Deseas eliminar el registro {{$i->description}}
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit"  class="btn btn-danger" value="Eliminar">
                        </div>
                </div>
        </form>
    </div>
</div>
