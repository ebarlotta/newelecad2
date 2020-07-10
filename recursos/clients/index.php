@extends('layout')
  
@section('areadetrabajo')
 
        <div class="row">
            <p class="btn-holder" style="margin-bottom: 0rem;">
                <a href="{{ route('principal') }}" class="btn btn-warning btn-block text-center" role="button"  data-toggle="modal" data-target="#create">
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
                                <a href="{{ route('principal',$client->id) }}" class="btn btn-success" data-toggle="modal" data-target="#modify">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('principal', $client->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#remove">
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
	    
    </div>
    <a href="{{ route('principal')}}" class="btn btn-info Back">Volver</a>
@endsection