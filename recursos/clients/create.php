@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="display: block;width:100%">
        <div class="Card-Add">
        <div class="card-body">
            <h5 class="card-title title-card">AGREGAR CLIENTES</h5>
            <p class="card-text">
                Apellido
                <input class="form-control txtbox" type="text" placeholder="Apellido y Nombre" name="client_name" id="client_name">
                Dirección
                <input class="form-control txtbox" type="text" placeholder="Dirección" name="client_address" id="client_address">
                Teléfono
                <input class="form-control txtbox" type="text" placeholder="Teléfono" name="client_telephone" id="client_telephone">
                E-Mail
                <input class="form-control txtbox" type="text" placeholder="E-Mail" name="client_email" id="client_email">
                Lista
                <select id="client_id_list" name="client_id_list" class="form-control">
                @foreach( $lists as $value )
                    <option value="{{ $value->id }}">{{ $value->list_name }}</option>
                @endforeach
                </select>
            </p>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Agregar" style="color: black;">
                @if($heredado) { <a href="{{ route('OT.index','0')}}" class="btn btn-info">Volver</a> } @endif
                <!--<a href="{{ route('clients.show_all') }}" class="btn btn-info Back">Volver</a>-->
            </div>
        </div>
    </div>
</form>


@endsection