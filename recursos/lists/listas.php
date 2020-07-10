@extends('layout')
  
@section('areadetrabajo')
 
        <div class="row">
            <p class="btn-holder" style="margin-bottom: 0rem;">
                <a class="btn btn-outline-dark" role="button"  data-toggle="modal" data-target="#create">
                    Agregar Lista
                </a>
            </p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table-holder table-responsive table-dark">
                    <thead style="text-align:center">
                        <th style="text-align:center">Nombre de la Lista</th>
                        <th style="text-align:center">Descripción</th>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td> {{ $list->list_name }}</td>
                            <td> {{ $list->list_description }}</td>
                            <td>
                                <a class="btn btn-success" data-id="{{ $list->id }}" data-toggle="modal" data-target="#modify">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#remove">
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
	    <a href="{{ route('principal')}}" class="btn btn-info">Volver</a>
    </div>


<!-- MODALES  
----------------
-->

    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div style="display: block;">
                            <div class="card" style="width: 100%; background-color: royalblue;">
                                <div class="card-body">
                                    <h5 class="card-title">LISTAS DE PRECIO</h5>
                                    <p class="card-text">
                                        Nombre de la lista
                                        <input class="txtbox" type="text" placeholder="Nombre" name="name" id="name" value="{{ $list->list_name }}">
                                        Descripción de la lista
                                        <input class="txtbox" type="text" placeholder="Descripción" name="description" id="description" value="{{ $list->list_description }}">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-success" value="Agregar">
                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="Cerrar">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modify">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{ route('update',$list->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">    
                        {{ csrf_field() }}
                        <div style="display: block;">
                            <div class="card" style="width:100%; background-color: royalblue;">
                                <div class="card-body">
                                    <h5 class="card-title">LISTAS DE PRECIO</h5>
                                    <p class="card-text">
                                        Nombre de la lista
                                        <input class="txtbox" type="text" placeholder="Nombre" name="name" id="name" value="{{ $list->list_name }}">
                                        Descripción de la lista
                                        <input class="txtbox" type="text" placeholder="Descripción" name="description" id="description" value="{{ $list->list_description }}">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-warning" value="Modificar">
                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="Cerrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="remove">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{ route('destroy',$list->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        @method('DELETE')
                    
                        <div style="display: block;">
                            <div class="card" style="width:100%; background-color: royalblue;">
                            <div class="card-body">
                                <h5 class="card-title">ELIMINAR LISTA DE PRECIO</h5>
                                <p class="card-text">
                                    Seguro que quiere eliminar la lista de precio?
                                </p>
                            </div>
                        </div>
                    </div>                
                    <div class="modal-footer" style="align:right;">
                        <input type="submit" class="btn btn-outline-danger" value="Eliminar">
                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="Cerrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

