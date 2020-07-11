var misDatos = angular.module('datosApp', []);

misDatos.controller('productController', function ($scope, $http) {

    // CONTROLADOR DE PRODUCTOS
    //------------------------

    $scope.init = function () {
        $scope.show();
        $scope.getLists();
        $scope.getUnities();
    }

    $scope.show = function () {
        $scope.loading = true;
        $http.get('../DevolverDatos.php?Opcion=Products&Param=')
            .then(function (datos) {
                $scope.Products = {};
                $scope.Products = datos.data;
                $scope.MostrarEspera = 0;
            });
    }

    $scope.ModalModificarOperacion = function (Opcion) {
        $scope.ModalModificar = Opcion;
    }

    $scope.getUnities = function () {
        $http.get('../DevolverDatos.php?Opcion=Unities&Param=')
            .then(function (datos) {
                $scope.Unities = {};
                $scope.Unities = datos.data;
            });
    }
    $scope.getLists = function () {
        $http.get('../DevolverDatos.php?Opcion=Lists&Param=')
            .then(function (datos) {
                $scope.Lists = {};
                $scope.Lists = datos.data;
            });
    }

    $scope.CargarDatosProducto = function (Prod) {
        $http.get('../DevolverDatos.php?Opcion=GetProductId&Param=' + Prod)
            .then(function (datos) {
                $scope.ID = datos.data[0].id;
                $scope.product_description = datos.data[0].product_description;
                $scope.product_price = datos.data[0].product_price;
                $scope.unity = datos.data[0].product_unity;
                $scope.list = datos.data[0].product_id_list;
            });
    }

    $scope.InsertProduct = function (operation) {
        $http.get('InsertProduct.php' + '?product_description=' + $scope.product_description
            +'&product_price=' + $scope.product_price 
            +'&product_unity=' + $scope.unity
            +'&product_id_list=' + $scope.list
            +'&product_id=' + $scope.ID
            +'&operation=' + operation)
            .then(function (datos) {
                $scope.init();
            });
    }

    $scope.DeleteProduct = function (a) {
        $http.get('DeleteProduct.php?Id=' + a)
            .then(function (datos) {
                $scope.init();
            });
    }
});