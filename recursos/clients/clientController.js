var misDatos = angular.module('datosApp', []);

misDatos.controller('clientController', function ($scope, $http) {

    // CONTROLADOR DE CLIENTES
    //------------------------

    $scope.init = function () {
        $scope.getClients();
    }

    $scope.getClients = function () {
        $http.get('../DevolverDatos.php?Opcion=Clients&Param=')
            .then(function (datos) {
                $scope.Clients = {};
                $scope.Clients = datos.data;
            });
    }

    $scope.CargarDatosCliente = function (Cli) {
        $http.get('../DevolverDatos.php?Opcion=GetClientId&Param=' + Cli)
            .then(function (datos) {
                $scope.ID = datos.data[0].id;
                $scope.client_name = datos.data[0].client_name;
                $scope.client_address = datos.data[0].client_address;
                $scope.client_telephone = datos.data[0].client_telephone;
                $scope.client_email = datos.data[0].client_email;
                //$scope.client_id_list = datos.data[0].list_name;
                $scope.client_photo = datos.data[0].client_photo;
            });
    }

    $scope.ModalModificarOperacion = function (Opcion) {
        $scope.ModalModificar = Opcion;
    }

    $scope.InsertClient = function (operation) {
        $http.get('InsertClient.php' + '?client_name=' + $scope.client_name
            +'&client_address=' + $scope.client_address
            +'&client_telephone=' + $scope.client_telephone
            +'&client_email=' + $scope.client_email
            +'&client_id_list=' + $scope.client_id_list
            +'&client_photo=' + $scope.client_photo
            +'&client_id=' + $scope.ID
            +'&operation=' + operation)
            .then(function (datos) {
                $scope.init();
            });
    }

    $scope.DeleteClient = function (a) {
        $http.get('../Delete.php?Id=' + a + '&module=clients')
            .then(function (datos) {
                $scope.init();
            });
    }
});