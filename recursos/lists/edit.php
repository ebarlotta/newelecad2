@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('lists.update',$list->id) }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">    
        {{ csrf_field() }}
        <div style="display: block;width:100%;">
            <div class="Card-Edit">
                <div class="card-body">
                    <h5 class="card-title title-card">LISTAS DE PRECIO</h5>
                    <p class="card-text">
                        Nombre de la lista
                        <input class="form-control txtbox" type="text" placeholder="Nombre" name="name" id="name" value="{{ $list->list_name }}">
                        Descripción de la lista
                        <input class="form-control txtbox" type="text" placeholder="Descripción" name="description" id="description" value="{{ $list->list_description }}">
                    </p>
    <div class="modal-footer">
        <input type="submit" class="btn btn-warning" style="color: black;" value="Modificar">
	    <a href="{{ route('lists.show')}}" class="btn btn-info">Volver</a>
    </div>
    </div>
            </div>

</form>

@endsection
