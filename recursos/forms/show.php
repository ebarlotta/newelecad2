@extends('layout')
  
@section('areadetrabajo')
 
        <div class="column">
            <a href="{{ route('forms.create') }}" class="btn btn-info Add" role="button">
                Agregar Forma de Pagos
            </a>
            <div>
                <table class="table-holder table-responsive table-dark table-striped">
                    <thead style="text-align:center">
                        <th style="text-align:center">Descripción</th>
                        <th style="text-align:center">Incremento</th>
                    </thead>
                    <tbody>
                        
                        @foreach($forms as $form)
                        <tr>
                            <td> {{ $form->fpay_description }}</td>
                            <td style="text-align:right"> {{ $form->fpay_increment }} %</td>
                            <td>
                                <a href="{{ route('forms.edit',$form->id) }}" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('forms.destroy', $form->id) }}" class="btn btn-danger">
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