<html >

<head>

    <title></title>
    <script type="text/javascript" src="productController.js"> </script>
    <?php include "../scripts.php"; ?>

</head>

<body style="background-color:black;" ng-controller="productController" ng-init="InitCreate()">

    <div class="container">
        <?php include "../navbar.php"; ?>
    </div>

        <!--<form action="{{  }}" method="POST" enctype="multipart/form-data">-->
            <div style="display: block;;width:100%">
                <div class="Card-Add">
                    <div class="card-body">
                        <h5 class="card-title title-card">AGREGAR PRODUCTOS</h5>
                        <p class="card-text">
                            Descripción
                            <input class="form-control txtbox" type="text" placeholder="Descripcion" name="product_description" id="product_description">
                            Precio m2
                            <input class="form-control txtbox" type="text" placeholder="Precio" name="product_price" id="product_price">

                            Unidad {{Unities}}
                            <input type="text" ng-model="texto" value="pepe">
                            <select class="form-control" ng-model="unity">
                                <option ng-repeat="u in Unities">
                                    {{u.unity_description}}
                                </option>
                            </select>
                            
                            Lista de precio {{Lists}}
                            <select id="product_id_list" name="product_id_list" class="form-control">
                                
                            </select>
                        </p>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" style="color: black;" value="Agregar">
                            <a href="" class="btn btn-info">Volver</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</body>