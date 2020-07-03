@extends('layout')
  
@section('areadetrabajo')
 
        <div class="column">
            <a href="{{ route('clients.create') }}" class="btn btn-info Add" role="button">
                Agregar Cliente
            </a>
            <div>
                <table class="table-holder table-responsive table-dark table-striped">
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
                            <td> {{ $client->client_name }}</td>
                            <td> {{ $client->client_address }}</td>
                            <td> {{ $client->client_telephone }}</td>
                            <td> {{ $client->client_email }}</td>
                            <td> {{ $client->list_name }}</td>
                            <td>
                                <a href="{{ route('clients.edit',$client->id) }}" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('clients.destroy', $client->id) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('otra','1')}}" class="btn btn-info Back">Volver</a>
        </div>
    </div>
@endsection