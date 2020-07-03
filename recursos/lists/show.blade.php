@extends('layout')
  
@section('areadetrabajo')
 
        <div class="column">
            <a class="btn btn-info Add" role="button" href="{{ route('lists.create') }}">
                Agregar Lista
            </a>
            <div>
                <table class="table-holder table-responsive table-dark table-based table-striped">
                    <thead style="text-align:center">
                        <th style="text-align:center">Nombre de la Lista</th>
                        <th style="text-align:center">Descripción</th>
                        <th style="text-align:center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td> {{ $list->list_name }}</td>
                            <td> {{ $list->list_description }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('lists.edit', $list->id) }}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('lists.destroy', $list->id) }}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <a href="{{ route('otra','1')}}" class="btn btn-info Back">Volver</a>
            </div>
        </div><!-- End column -->
    

@endsection