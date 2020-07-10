<html ng-app="datosApp">

<head>

    <title></title>
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
                    <a href="./create.php" class="btn btn-info Add" role="button">
                        Agregar Producto
                    </a>
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
                                <td> {{product.product_unity}} </td>
                                <td> {{product.unity_signed}} </td>
                                <td> {{product.list_name}} </td>
                                <td>
                                    <a href="./edit.php" class="btn btn-success">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a href="./delete.php" class="btn btn-danger">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="../../" class="btn btn-info Back">Volver</a>
            </div>
        </div>

    </div>

</body>

</html>