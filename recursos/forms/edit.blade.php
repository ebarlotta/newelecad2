@extends('layout')
  
@section('areadetrabajo')

    <form action="{{ route('forms.update',$form->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div style="display: block;width: 100%;">
            <div class="Card-Edit">
            <div class="card-body">
                <h5 class="card-title title-card">FORMAS DE PAGO</h5>
                <p class="card-text">
                    Descripción de la forma de pago
                    <input class="form-control txtbox" type="text" placeholder="Descripción" name="description" id="description" value="{{ $form->fpay_description }}">
                    Porcentaje de Incremento
                    <input class="form-control txtbox" type="text" placeholder="Incremento" name="increment" id="increment" value="{{ $form->fpay_increment }}">
                </p>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-warning" style="color: black;"  value="Modificar">
                    <a href="{{ route('forms.show_all')}}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </form>

    @endsection