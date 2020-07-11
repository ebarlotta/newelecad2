var misDatos = angular.module('datosApp', []);

misDatos.controller('listController', function ($scope, $http) {

    // CONTROLADOR DE LISTAS
    //------------------------

    $scope.init = function () {
        $scope.show();
        $scope.getLists();
        $scope.getUnities();
    }

    $scope.getLists = function () {
        $http.get('../DevolverDatos.php?Opcion=Lists&Param=')
            .then(function (datos) {
                $scope.Lists = {};
                $scope.Lists = datos.data;
            });
    }

    $scope.CargarDatosLista = function (Lis) {
        $http.get('../DevolverDatos.php?Opcion=GetListId&Param=' + Lis)
            .then(function (datos) {
                $scope.ID = datos.data[0].id;
                $scope.list_name = datos.data[0].list_name;
                $scope.list_description = datos.data[0].list_description;
            });
    }

    $scope.show = function () {
        $scope.loading = true;
        $http.get('../DevolverDatos.php?Opcion=List&Param=')
            .then(function (datos) {
                $scope.Lists = {};
                $scope.Lists = datos.data;
                $scope.MostrarEspera = 0;
            });
    }

    $scope.ModalModificarOperacion = function (Opcion) {
        $scope.ModalModificar = Opcion;
    }

    $scope.InsertList = function (operation) {
        $http.get('InsertList.php' + '?list_name=' + $scope.list_name
            +'&list_description=' + $scope.list_description
            +'&list_id=' + $scope.ID
            +'&operation=' + operation)
            .then(function (datos) {
                $scope.init();
            });
    }

    $scope.DeleteList = function (a) {
        $http.get('../Delete.php?Id=' + a + '&module=lists')
            .then(function (datos) {
                $scope.init();
            });
    }
});