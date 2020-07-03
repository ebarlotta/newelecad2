@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="display: block;width: 100%;">
        <div class="Card-Add">
            <div class="card-body">
                <h5 class="card-title title-card">FORMAS DE PAGO</h5>
                <p class="card-text">
                    Descripción de la forma de pago
                    <input class="form-control txtbox" type="text" placeholder="Descripción" name="description" id="description">
                    Porcentaje de Incremento
                    <input class="form-control txtbox" type="text" placeholder="Incremento" name="increment" id="increment">
                </p>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" style="color: black;" value="Agregar">
                    <a href="{{ route('forms.show_all')}}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
