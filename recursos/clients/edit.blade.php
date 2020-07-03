@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('clients.update',$clients->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="display: block;width:100%">
        <div class="Card-Edit">
        <div class="card-body">
            <h5 class="card-title title-card">EDITAR CLIENTES</h5>
            <p class="card-text">
                Apellido
                <input class="txtbox" type="text" placeholder="Apellido y Nombre" name="client_name" id="client_name" value="{{ $clients->client_name }}">
                Dirección
                <input class="txtbox" type="text" placeholder="Dirección" name="client_address" id="client_address" value="{{ $clients->client_address }}">
                Teléfono
                <input class="txtbox" type="text" placeholder="Teléfono" name="client_telephone" id="client_telephone" value="{{ $clients->client_telephone }}">
                E-Mail
                <input class="txtbox" type="text" placeholder="Email" name="client_email" id="client_email" value="{{ $clients->client_email }}">
                Lista
                <select id="client_id_list" name="client_id_list" class="form-control">
                @foreach( $lists as $list )
                    <option value="{{ $list->id }}" {{ $list->id==$clients->id ? ' selected':'' }} >{{ $list->list_name }}</option>
                @endforeach
                </select>
            </p>
            <div class="modal-footer">
                <input type="submit" class="btn btn-warning" value="Modificar">
                <a href="{{ route('clients.show_all')}}" class="btn btn-info">Volver</a>
            </div>
        </div>
    </div>
</form>

@endsection