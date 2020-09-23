var misDatos = angular.module('datosApp', []);

misDatos.controller('OTController', function($scope, $http) {

    // CONTROLADOR DE ORDEN DE TRABAJO
    //--------------------------------

    $scope.init = function() {
        $scope.getClients();
        $scope.getProducts();
        $scope.getOTs();
        $scope.CargarVentasOrdenes();
        $scope.VentasNoCobradas();
    }

    $scope.getOTs = function() {
        $http.get('../DevolverDatos.php?Opcion=OTs&Param=')
            .then(function(datos) {
                $scope.OTs = {};
                $scope.OTs = datos.data;
            });
    }

    $scope.getProducts = function() {
        $scope.loading = true;
        $http.get('../DevolverDatos.php?Opcion=Products&Param=')
            .then(function(datos) {
                $scope.Products = {};
                $scope.Products = datos.data;
                $scope.MostrarEspera = 0;
            });
    }

    $scope.getClients = function() {
        $http.get('../DevolverDatos.php?Opcion=Clients&Param=')
            .then(function(datos) {
                $scope.Clients = {};
                $scope.Clients = datos.data;
            });
    }

    $scope.CargarDatosProducto = function(Prod) {
        $http.get('../DevolverDatos.php?Opcion=GetProductId&Param=' + Prod)
            .then(function(datos) {
                $scope.ProductID = datos.data[0].id;
                $scope.product_description = datos.data[0].product_description;
                $scope.product_price = datos.data[0].product_price;
                $scope.unity = datos.data[0].product_unity;
                $scope.list = datos.data[0].product_id_list;
            });
    }

    $scope.CalcularTotal = function() {
        $scope.Detail_total = $scope.product_price * $scope.Detail_quantity * $scope.Detail_width * $scope.Detail_height;
    }

    $scope.CalcularM2 = function() {
        $scope.m2 = $scope.Detail_quantity * $scope.Detail_width * $scope.Detail_height;
    }

    $scope.AddElement = function() {
        //Validate

        if ($scope.OT_date === undefined) { return $scope.Mensaje = "Facha inválida"; }
        if ($scope.OT_client != "") {} else { return $scope.Mensaje = "Falta cliente"; }
        if (!$scope.OT_detail) { return $scope.Mensaje = "Falta detalle"; }
        if (!$scope.selectproduct) { return $scope.Mensaje = "Falta Seleccionar producto"; }
        if (!$scope.Detail_quantity) { return $scope.Mensaje = "Falta Seleccionar cantidad"; }
        if (!$scope.Detail_width) { return $scope.Mensaje = "Falta Seleccionar ancho"; }
        if (!$scope.Detail_height) { return $scope.Mensaje = "Falta Seleccionar alto"; }
        if (!$scope.product_price) { return $scope.Mensaje = "Falta Seleccionar precio"; }
        $scope.Mensaje = "";

        $scope.AddOT();
        $scope.AddDetail($scope.OT);
    }

    $scope.AddOT = function() {
        $http.get('InsertOT.php' + '?Id_client=' + $scope.OT_client +
                '&OT_detail=' + $scope.OT_detail +
                '&OT_file=' +
                '&ots_state_=1' +
                '&OT_date=' + $scope.OT_date)
            .then(function(datos) {
                $scope.Mensaje = "Orden de trabajo agregada";
                $scope.Mensaje = datos.data[0].Ot_id;

            });
    }

    $scope.AddDetail = function(Ot_id) {
        $http.get('InsertDetail.php' + '?Rel_Id_OT=' + Ot_id +
                '&Rel_Id_product=' + $scope.selectproduct +
                '&Rel_quantity=' + $scope.Detail_quantity +
                '&Rel_width=' + $scope.Detail_width +
                '&Rel_height=' + $scope.Detail_height +
                '&Rel_price=' + $scope.product_price +
                '&Rel_state=1')
            .then(function(datos) {
                //$scope.Mensaje="Detalle agregada";
                //$scope.AddDetail();
            });
    }





    $scope.CargarDatosCliente = function(Cli) {
        $http.get('../DevolverDatos.php?Opcion=GetClientId&Param=' + Cli)
            .then(function(datos) {
                $scope.ID = datos.data[0].id;
                $scope.client_name = datos.data[0].client_name;
                $scope.client_address = datos.data[0].client_address;
                $scope.client_telephone = datos.data[0].client_telephone;
                $scope.client_email = datos.data[0].client_email;
                //$scope.client_id_list = datos.data[0].list_name;
                $scope.client_photo = datos.data[0].client_photo;
            });
    }

    $scope.ModalModificarOperacion = function(Opcion) {
        $scope.ModalModificar = Opcion;
    }

    $scope.InsertClient = function(operation) {
        $http.get('InsertClient.php' + '?client_name=' + $scope.client_name +
                '&client_address=' + $scope.client_address +
                '&client_telephone=' + $scope.client_telephone +
                '&client_email=' + $scope.client_email +
                '&client_id_list=' + $scope.client_id_list +
                '&client_photo=' + $scope.client_photo +
                '&client_id=' + $scope.ID +
                '&operation=' + operation)
            .then(function(datos) {
                $scope.init();
            });
    }

    $scope.DeleteClient = function(a) {
        $http.get('../Delete.php?Id=' + a + '&module=clients')
            .then(function(datos) {
                $scope.init();
            });
    }


    $scope.CargarVentasOrdenes = function() {
        $http.get('../DevolverDatos.php?Opcion=VentasMensuales&Param=')
            .then(function(datos) {
                $scope.ordenes = datos.data;
                //console.log(datos.data[0]['TotalGral']);
                $scope.TotalGral = datos.data[0]['TotalGral'];
            });
    }

    $scope.VentasNoCobradas = function() {
        $http.get('../DevolverDatos.php?Opcion=VentasNoCobradas&Param=')
            .then(function(datos) {
                $scope.ordenesNC = datos.data;
                //console.log(datos.data[0]['TotalGral']);
                $scope.TotalGralNC = datos.data[0]['TotalGral'];
            });
    }
});