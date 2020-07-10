@extends('layout')
  
@section('areadetrabajo')
 
        <div class="row">
            <p class="btn-holder" style="margin-bottom: 0rem;">
                <a href="{{ route('clients.create') }}" class="btn btn-warning btn-block text-center" role="button"  data-toggle="modal" data-target="#create">
                    Agregar a Carrito
                </a>
            </p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table-holder table-responsive table-dark">
                    <thead style="text-align:center">
                        <th style="text-align:center">Apellido</th>
                        <th style="text-align:center">Dirección</th>
                        <th style="text-align:center">Teléfono</th>
                        <th style="text-align:center">E-Mail</th>
                        <th style="text-align:center">Lista</th>
                    </thead>
                    <tbody>
                        
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td> {{ $client->address }}</td>
                            <td> {{ $client->telephone }}</td>
                            <td> {{ $client->email }}</td>
                            <td> {{ $client->list_name }}</td>
                            <td>
                                <a href="{{ route('clients.edit',$client->id) }}" class="btn btn-success" data-toggle="modal" data-target="#modify">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('clients.destroy', $client->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#remove">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- End row -->
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        @if({{ $heredado }}) {
                 <a href="{{ route('OT','0')}}" class="btn btn-info">Volver</a> }
        @else { <a href="{{ route('clients')}}" class="btn btn-info">Volver</a> }
    </div>

@endsection