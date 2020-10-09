<html ng-app="datosApp">

<head>
    <title></title>
    <script type="text/javascript" src="../../bootstrap/angular.min.js"></script>
    <script type="text/javascript" src="clientController.js"> </script>
    <?php include "../scripts.php"; ?>
</head>

<body style="background-color:black;" ng-controller="clientController" ng-init="init();">

    <div class="container">
        <?php include "../navbar.php"; ?>
    </div>

    <div class="container page">
        <div class="row" style="display: flex;">
            <div class="column">
                <p class="btn-holder" style="margin-bottom: 0rem;">
                    <i class="btn btn-info Add" ng-click="ModalModificarOperacion('Agregar');" data-toggle="modal" data-target="#myModalModifyClient">
                        Agregar Clientes
                    </i>
                </p>
                <div>
                    <table class="table-holder table-responsive table-dark">
                        <thead style="text-align:center">
                            <th style="text-align:center">Apellido</th>
                            <th style="text-align:center">Dirección</th>
                            <th style="text-align:center">Teléfono</th>
                            <th style="text-align:center">E-Mail</th>
                            <th style="text-align:center">Lista</th>
                            <th colspan="2" style="text-align:center">Opciones</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="client in Clients">
                                <td> {{ client.client_name }}</td>
                                <td> {{ client.client_address }} </td>
                                <td> {{ client.client_telephone }} </td>
                                <td> {{ client.client_email }} </td>
                                <td> {{ client.list_name }} </td>
                                <td>
                                    <i class="fa fa-refresh btn btn-success" data-toggle="modal" data-target="#myModalModifyClient" ng-click="ModalModificarOperacion('Modificar'); CargarDatosCliente(client.id);"> Modificar</i>
                                    <i class="fa fa-remove btn btn-danger" data-toggle="modal" data-target="#myModalDeleteClient" ng-click="CargarDatosCliente(client.id);"> Eliminar</i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="../../" class="btn btn-info Back">Volver</a>
            </div><!-- End row -->
        </div>
        <!--  AGREGAR / MODIFICAR CLIENTE
              ----------------- -->
        <div class="modal fade" id="myModalModifyClient" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" ng-show="ModalModificar=='Agregar'">Agregar cliente</h3>
                        <h3 class="modal-title" ng-show="ModalModificar=='Modificar'">Modificar cliente</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">AGREGAR CLIENTE</h5>
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Modificar'">MODIFICAR CLIENTE</h5>
                                    <p class="card-text">
                                        Apellido y Nombre del cliente
                                        <input class="form-control txtbox" type="text" placeholder="Apellido y Nombre del cliente" ng-model="client_name">
                                        Dirección
                                        <input class="form-control txtbox" type="text" placeholder="Dirección" ng-model="client_address">
                                        Teléfono
                                        <input class="form-control txtbox" type="text" placeholder="Teléfono" ng-model="client_telephone">
                                        Correo Electrónico
                                        <input class="form-control txtbox" type="text" placeholder="Correo Electrónico" ng-model="client_email">
                                        Lista de Precio
                                        <select class="form-control" ng-model="client_id_list">
                                            <option ng-repeat="list in lists" value="{{list.id}}">{{ list.list_name }}</option>
                                        </select>
                                        <!--<input class="form-control txtbox" type="text" placeholder="Lista de Precio" ng-model="client_id_list">-->
                                        Fotografía
                                        <input class="form-control txtbox" type="text" placeholder="Fotografía" ng-model="client_photo">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-show="ModalModificar=='Agregar'" type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertClient(1);" style="font-size: 0.8em;">Agregar</button>
                        <button ng-show="ModalModificar=='Modificar'" type="button" class="btn btn-warning" data-dismiss="modal" ng-click="InsertClient(0);" style="font-size: 0.8em;">Modificar</button>

                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Add client -->

        <!--  DELETE LIST 
              ----------------- -->
        <div class="modal fade" id="myModalDeleteClient" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Eliminar Cliente</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">ELIMINAR CLIENTE</h5>
                                    <p class="card-text">
                                        Seguro que quiere eliminar el cliente {{ client_name }}?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="DeleteClient(ID);" style="font-size: 0.8em;">Eliminar</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Delete client -->
    </div>
</body>

</html>