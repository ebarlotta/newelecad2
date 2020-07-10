@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('destroy',$list->id) }}" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        {{ csrf_field() }}
        @method('DELETE')
    
        <div style="display: block;">
            <div class="card" style="width:100%; background-color: royalblue;">
            <div class="card-body">
                <h5 class="card-title">ELIMINAR LISTA DE PRECIO</h5>
                <p class="card-text">
                    Seguro que quiere eliminar la lista de precio?
                </p>
            </div>
        </div>
    </div>                
    <div class="modal-footer" style="align:right;">
        <input type="submit" class="btn btn-outline-danger" value="Eliminar">
        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="Cerrar">
    </div>
</form>

@endsection