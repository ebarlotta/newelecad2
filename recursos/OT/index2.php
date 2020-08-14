<html ng-app="datosApp">

<head>
    <title></title>
    <script type="text/javascript" src="../../bootstrap/angular.min.js"></script>
    <script type="text/javascript" src="OTController.js"> </script>
    <?php include "../scripts.php"; ?>
    <script type="text/javascript">
        function CalcularTotal() {
            var total;
            var metros;
            total = parseFloat(Detail_quantity.value)*parseFloat(Detail_width.value)*parseFloat(Detail_height.value)*parseFloat(Detail_price.value);
            metros = parseFloat(Detail_width.value)*parseFloat(Detail_height.value);
            if(total>0) {
                Detail_total.value = total; 
                m2.value = metros;
            }
            else {
                Detail_total.value = 0; 
                m2.value = 0;
            }
        }
    </script>
</head>

<body style="background-color:black;" ng-controller="OTController" ng-init="init();">

    <div class="container">
        <?php include "../navbar.php"; ?>
    </div>
    <div class="container page">
        <div class="row" style="display: flex;">
            <div class="column">
            <div class="alert alert-success jumbotron" style="margin: 20px;" id="successMessage" ng-model="success">
                    {{ Session('message') }}
                </div>
                <li >
                <div class="alert alert-danger jumbotron" style="margin: 20px;">
                        {{ Mensaje }}
                </div>
                </li>
                <div style="width:100%;color: white;">
                    <div style="width: 800px; margin-left: 40px; background-color: #152850; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem;">
                        <form action="{{ route('OT_Add') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="idclient" name="idclient" value="">
                            <input type="text" ng-model="OT" ng-value="{{ OT }}">
                            <table class="table" style="color:white;">
                                <tr>
                                    <td>Fecha<br><input class="form-control txtbox" type="date" placeholder="Fecha de inicio" ng-model="OT_date" style="width: 160px;"></td>
                                    <td>Cliente<br>
                                        <select ng-model="OT_client" ng-value="OT_client" class="form-control" style="width: 300px;">
                                            <option selected value=""></option>
                                            <option ng-repeat="client in Clients" value="{{ client.id }}">{{ client.client_name }}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="../clients">
                                            <button type="button" class="btn btn-default btn-lg" style="background-color:yellow;margin-top: 19px;">
                                                <spam class="fa fa-arrow-right" style="font-size:20px;color:lightblue;text-shadow:2px 2px 4px #000000;"></spam>
                                                Agregar Cliente
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <table style="width:100%; margin:10px; color:white;">
                                <tr>
                                    <td>
                                        Detalle de Trabajo<br>
                                        <textarea ng-model="OT_detail" ng-value="OT_detail" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
                                    </td>
                                </tr>
                            </table>

                            <table style="border: 1px solid black; color:white; width:97%; margin:10px;padding:5px;">
                                <tr>
                                    <td colspan="3" style="text-align: center;">Elementos a utilizar</td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2" style="text-align: right;">
                                        <input type="button" class="btn btn-warning" style="color: black;" value="Agregar Elemento" ng-model="Add;" ng-click="AddElement();"></td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>Elemento</td>
                                    <td>Cantidad</td>
                                    <td>Ancho</td>
                                    <td>Alto</td>
                                    <td>Precio M2</td>
                                    <td>M2</td>
                                    <td>Total</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td><select class="form-control" style="width:175px;" ng-model="selectproduct" ng-change="CargarDatosProducto(selectproduct);">
                                            <option value="" selected></option>
                                            <option ng-repeat="product in Products" value="{{ product.id }}">{{ product.product_description }}</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control txtbox" type="text" placeholder="Cantidad" ng-model="Detail_quantity" ng-value="Detail_quantity" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
                                    <td><input class="form-control txtbox" type="text" placeholder="Ancho" ng-model="Detail_width" ng-value="Detail_width" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
                                    <td><input class="form-control txtbox" type="text" placeholder="Alto" ng-model="Detail_height" ng-value="Detail_height" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
                                    <td><input class="form-control txtbox" type="text" placeholder="PrecioM2" ng-model="product_price" ng-value="product_price" style="width:100px" ng-change="CalcularTotal();" disabled></td>

                                    <td><input class="form-control txtbox" type="text" placeholder="m2" ng-model="m2" disabled style="width:100px"></td>
                                    <td><input class="form-control txtbox" type="text" placeholder="Total" ng-model="Detail_total" style="width:100px" disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <?php $total = 0; ?>
                                <tr>
                                    <td colspan=5></td>
                                    <td>Total</td>
                                    <td>{{ $total }}</td>
                                </tr>
                                </tr>
                            </table>

                        </form>
                        <a href="../../" class="btn btn-info Back">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>