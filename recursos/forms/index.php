<html ng-app="datosApp">

<head>
    <title></title>
    <script type="text/javascript" src="../../bootstrap/angular.min.js"></script>
    <script type="text/javascript" src="formController.js"> </script>
    <?php include "../scripts.php"; ?>
</head>

<body style="background-color:black;" ng-controller="formController" ng-init="init();">

    <div class="container">
        <?php include "../navbar.php"; ?>
    </div>

    <div class="container page">
        <div class="row" style="display: flex;">
            <div class="column">
                <p class="btn-holder" style="margin-bottom: 0rem;">
                    <i class="btn btn-info Add" ng-click="ModalModificarOperacion('Agregar');" data-toggle="modal" data-target="#myModalModifyList">
                        Agregar Formas
                    </i>
                </p>
                <div>
                    <table class="table-holder table-responsive table-dark table-striped">
                        <thead style="text-align:center">
                            <th style="text-align:center">Nombre de la forma de Pago</th>
                            <th style="text-align:center">Incremento</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="form in Forms">
                                <td> {{ form.forma_description}}</td>
                                <td> {{ form.forma_increment }} </td>
                                <td>                                
                                    <i class="fa fa-refresh btn btn-success" data-toggle="modal" data-target="#myModalModifyList" ng-click="ModalModificarOperacion('Modificar'); CargarDatosForma(form.id);"> Modificar</i>
                                    <i class="fa fa-remove btn btn-danger" data-toggle="modal" data-target="#myModalDeleteList" ng-click="CargarDatosForma(form.id);"> Eliminar</i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="../../" class="btn btn-info Back">Volver</a>
            </div>
        </div>

        <!--  AGREGAR / MODIFICAR LIST
              ----------------- -->
        <div class="modal fade" id="myModalModifyList" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" ng-show="ModalModificar=='Agregar'">Agregar forma</h3>
                        <h3 class="modal-title" ng-show="ModalModificar=='Modificar'">Modificar forma</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">AGREGAR FORMA</h5>
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Modificar'">MODIFICAR FORMA</h5>
                                    <p class="card-text">
                                        Nombre de la forma
                                        <input class="form-control txtbox" type="text" placeholder="Nombre de la forma" ng-model="forma_description">
                                        Incremento
                                        <input class="form-control txtbox" type="text" placeholder="Descripción" ng-model="forma_increment">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-show="ModalModificar=='Agregar'" type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertForm(1);" style="font-size: 0.8em;">Agregar</button>
                        <button ng-show="ModalModificar=='Modificar'" type="button" class="btn btn-warning" data-dismiss="modal" ng-click="InsertForm(0);" style="font-size: 0.8em;">Modificar</button>    

                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Add form -->
        
        <!--  DELETE LIST 
              ----------------- -->
              <div class="modal fade" id="myModalDeleteList" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" >Eliminar Lista</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">ELIMINAR FORMA</h5>
                                    <p class="card-text">
                                        Seguro que quiere eliminar la forma de pago {{ forma_description }}?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="DeleteForm(ID);" style="font-size: 0.8em;">Eliminar</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Delete form -->
    </div>

</body>

</html>