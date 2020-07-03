@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('lists.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="display: block;width: 100%;">
        <div class="Card-Add">
            <div class="card-body">
                <h5 class="card-title title-card">LISTAS DE PRECIO</h5>
                <p class="card-text">
                    Nombre de la lista
                    <input class="form-control txtbox" type="text" placeholder="Nombre" name="name" id="name">
                    Descripción de la lista
                    <input class="form-control txtbox" type="text" placeholder="Descripción" name="description" id="description">
                </p>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" style="color: black;" value="Agregar">
                <a href="{{ route('lists.show')}}" class="btn btn-info">Volver</a>
            </div>
        </div>
    </div>
</form>

@endsection
