var misDatos = angular.module('datosApp', []);

misDatos.controller('formController', function ($scope, $http) {

    // CONTROLADOR DE FORMAS
    //------------------------

    $scope.init = function () {
        $scope.show();
        $scope.getForms();
    }

    $scope.getForms = function () {
        $http.get('../DevolverDatos.php?Opcion=Forms&Param=')
            .then(function (datos) {
                $scope.Forms = {};
                $scope.Forms = datos.data;
            });
    }

    $scope.CargarDatosForma = function (For) {
        $http.get('../DevolverDatos.php?Opcion=GetFormId&Param=' + For)
            .then(function (datos) {
                $scope.ID = datos.data[0].id;
                $scope.forma_description = datos.data[0].forma_description;
                $scope.forma_increment = datos.data[0].forma_increment;
            });
    }

    $scope.show = function () {
        $scope.loading = true;
        $http.get('../DevolverDatos.php?Opcion=Forms&Param=')
            .then(function (datos) {
                $scope.Forms = {};
                $scope.Forms = datos.data;
                $scope.MostrarEspera = 0;
            });
    }

    $scope.ModalModificarOperacion = function (Opcion) {
        $scope.ModalModificar = Opcion;
    }

    $scope.InsertForm = function (operation) {
        $http.get('InsertForm.php' + '?forma_description=' + $scope.forma_description
            +'&forma_increment=' + $scope.forma_increment
            +'&form_id=' + $scope.ID
            +'&operation=' + operation)
            .then(function (datos) {
                $scope.init();
            });
    }

    $scope.DeleteForm = function (a) {
        $http.get('../Delete.php?Id=' + a + '&module=forms')
            .then(function (datos) {
                $scope.init();
            });
    }
});