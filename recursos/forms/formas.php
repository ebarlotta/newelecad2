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
                        <th style="text-align:center">Descripción</th>
                        <th style="text-align:center">Incremento</th>
                    </thead>
                    <tbody>
                        
                        @foreach($pays as $pay)
                        <tr>
                            <td> {{ $pay->fpay_description }}</td>
                            <td style="text-align:right"> {{ $pay->fpay_increment }} %</td>
                            <td>
                                <a href="{{ route('principal',$pay->id) }}" class="btn btn-success" data-toggle="modal" data-target="#modify">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('principal', $pay->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#remove">
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
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h5>Agregar Forma de Pago</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('createFormas') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div style="display: block;">
                        <div class="card" style="width: 48%;margin: 10px;background-color: royalblue;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">FORMAS DE PAGO</h5>
                            <p class="card-text">
                                Descripción de la forma de pago
                                <input class="txtbox" type="text" placeholder="Descripción" name="Descripcion" id="Descripcion">
                                Porcentaje de Incremento
                                <input class="txtbox" type="text" placeholder="Incremento" name="Incremento" id="Incremento">
                            </p>
                            <div class="col-lg-offset-4 col-lg-3"><input class="btn btn-success col-xs-12 col-sm-12 col-md-12" type="submit" value="Agregar"></div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modify">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h5>Modificar Forma de Pago</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('createFormas') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div style="display: block;">
                            <div class="card" style="width: 48%;margin: 10px;background-color: royalblue;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">FORMAS DE PAGO</h5>
                                <p class="card-text">
                                    Descripción de la forma de pago
                                    <input class="txtbox" type="text" placeholder="Descripción" name="Descripcion" id="Descripcion">
                                    Porcentaje de Incremento
                                    <input class="txtbox" type="text" placeholder="Incremento" name="Incremento" id="Incremento">
                                </p>
                                <div class="col-lg-offset-4 col-lg-3"><input class="btn btn-success col-xs-12 col-sm-12 col-md-12" type="submit" value="Agregar"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="remove">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h5>Eliminar Forma de Pago</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('createClientes') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div style="display: block;">
                        <div class="card" style="margin: 10px;background-color: royalblue;">
                        <div class="card-body">
                            <h5 class="card-title">ELIMINAR FORMA DE PAGO</h5>
                            <p class="card-text">
                                Seguro que quiere eliminar la forma de pago?
                            </p>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

