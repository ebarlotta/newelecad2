<html ng-app="datosApp">

<head>
    <title></title>
    <script type="text/javascript" src="../../bootstrap/angular.min.js"></script>
    <script type="text/javascript" src="productController.js"> </script>
    <?php include "../scripts.php"; ?>
</head>

<body style="background-color:black;" ng-controller="productController" ng-init="init();">

    <div class="container">
        <?php include "../navbar.php"; ?>
    </div>

    <div class="container page">
        <div class="row" style="display: flex;">
            <div class="column">
                <p class="btn-holder" style="margin-bottom: 0rem;">
                    <i class="btn btn-info Add" ng-click="ModalModificarOperacion('Agregar');" data-toggle="modal" data-target="#myModalModifyProduct">
                        Agregar Producto
                    </i>
                </p>
                <div>
                    <table class="table-holder table-responsive table-dark table-striped">
                        <thead style="text-align:center">
                            <th style="text-align:center">Descripción</th>
                            <th style="text-align:center">Precio m2</th>
                            <th style="text-align:center">Unidad</th>
                            <th style="text-align:center">Lista</th>
                            <th style="text-align:center">Opciones</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="product in Products">
                                <td> {{ product.product_description}}</td>
                                <td style="text-align:right"> $ {{ product.product_price}}</td>
                                <td> {{product.unity_signed}} </td>
                                <td> {{product.list_name}} </td>
                                <td>                                
                                    <i class="fa fa-refresh btn btn-success" data-toggle="modal" data-target="#myModalModifyProduct" ng-click="ModalModificarOperacion('Modificar'); CargarDatosProducto(product.id);"> Modificar</i>
                                    <i class="fa fa-remove btn btn-danger" data-toggle="modal" data-target="#myModalDeleteProduct" ng-click="CargarDatosProducto(product.id);"> Eliminar</i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="../../" class="btn btn-info Back">Volver</a>
            </div>
        </div>
        <a href="#" class="float">
<i class="fa fa-plus my-float"></i>
</a>
        <!--  AGREGAR / MODIFICAR PRODUCT 
              ----------------- -->
        <div class="modal fade" id="myModalModifyProduct" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" ng-show="ModalModificar=='Agregar'">Agregar producto</h3>
                        <h3 class="modal-title" ng-show="ModalModificar=='Modificar'">Modificar producto</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">AGREGAR PRODUCTOS</h5>
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Modificar'">MODIFICAR PRODUCTOS</h5>
                                    <p class="card-text">
                                        Descripción
                                        <input class="form-control txtbox" type="text" placeholder="Descripcion" ng-model="product_description">
                                        Precio m2
                                        <input class="form-control txtbox" type="text" placeholder="Precio" ng-model="product_price">
                                        Unidad
                                        <select class="form-control" ng-model="unity">
                                            <option ng-repeat="u in Unities" value="{{ u.id }}">
                                                {{u.unity_description}}
                                            </option>
                                        </select>
                                        Lista de precio
                                        <select class="form-control" ng-model="list">
                                            <option ng-repeat="l in Lists" value="{{ l.id }}">
                                                {{ l.list_name }}
                                            </option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-show="ModalModificar=='Agregar'" type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertProduct(1);" style="font-size: 0.8em;">Agregar</button>
                        <button ng-show="ModalModificar=='Modificar'" type="button" class="btn btn-warning" data-dismiss="modal" ng-click="InsertProduct(0);" style="font-size: 0.8em;">Modificar</button>    

                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Add product -->
        
        <!--  DELETE PRODUCT 
              ----------------- -->
              <div class="modal fade" id="myModalDeleteProduct" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" >Eliminar producto</h3>
                    </div>
                    <div class="modal-body">
                        <h4>{{ModalUbicDesc}}</h4>
                        <div style="display: block;;width:100%">
                            <div class="Card-Add">
                                <div class="card-body">
                                    <h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">ELIMINAR PRODUCTOS</h5>
                                    <p class="card-text">
                                        Seguro que quiere eliminar el producto {{ product_description }}?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="DeleteProduct(ID);" style="font-size: 0.8em;">Eliminar</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!-- //Delete product -->
    </div>

</body>

</html>