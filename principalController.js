var misDatos = angular.module('datosApp', []);

misDatos.controller('principalController', function($scope, $http) {

    // CONTROLADOR DE ORDEN DE TRABAJO
    //--------------------------------

    $scope.init = function() {
        $scope.getClients();
        $scope.getOTsInitial();
        $scope.GetProducts();
    }

    $scope.getClients = function() {
        $http.get('recursos/DevolverDatos.php?Opcion=Clients&Param=')
            .then(function(datos) {
                $scope.Clients = {};
                $scope.Clients = datos.data;
            });
    }

    $scope.getOTsInitial = function() {
        $http.get('recursos/OT/ListarOT.php?state=1')
            .then(function(datos) {
                $scope.ots = {};
                $scope.ots = datos.data;
            });
    }

    $scope.getOTsByState = function(state) {
        $http.get('recursos/OT/ListarOT.php?state=' + state)
            .then(function(datos) {
                $scope.ots = {};
                $scope.ots = datos.data;
            });
    }

    $scope.CargaOT = function(id) {
        $http.get('recursos/DevolverDatos.php?Opcion=CargarOT&Param=' + id)
            .then(function(datos) {
                //$scope.otModify = {};
                $scope.OT_date_modify = Date(datos.data[0].OT_date);
                $scope.OT_client_modify = datos.data[0].client_name;
                $scope.OT_detail_modify = datos.data[0].OT_detail;
                $scope.OT_id = id;
                $scope.DetailsOT(id);
                $scope.CalcularTotal(id);
                //$scope.otModify = datos.data;
            });
    }

    $scope.CalcularTotal = function(id) {
        $http.get('recursos/DevolverDatos.php?Opcion=CalcularTotal&Param=' + id)
            .then(function(datos) {
                $scope.total = datos.data['Total'];
                console.log($scope.total);
            });
    }
    $scope.DetailsOT = function(id) {
        $http.get('recursos/DevolverDatos.php?Opcion=DetailsOT&Param=' + id)
            .then(function(datos) {
                $scope.Ot_modifys = datos.data;
            });
    }
    $scope.GetProducts = function() {
        $scope.loading = true;
        $http.get('recursos/DevolverDatos.php?Opcion=Products&Param=')
            .then(function(datos) {
                $scope.Products = {};
                $scope.Products = datos.data;
                $scope.MostrarEspera = 0;
            });
    }

    $scope.CargarDatosProducto = function(Prod) {
        $http.get('recursos/DevolverDatos.php?Opcion=GetProductId&Param=' + Prod)
            .then(function(datos) {
                $scope.ID = datos.data[0].id;
                $scope.product_description = datos.data[0].product_description;
                $scope.product_price = datos.data[0].product_price;
                $scope.unity = datos.data[0].product_unity;
                $scope.list = datos.data[0].product_id_list;
            });
    }

    $scope.InsertRelacion = function(ID) {
        $http.get('recursos/products/InsertRelacion.php' + '?Rel_Id_OT=' + $scope.ID +
                '&Rel_Id_product=' + $scope.selectproduct +
                '&Rel_quantity=' + $scope.Detail_quantity +
                '&Rel_width=' + $scope.Detail_width +
                '&Rel_height=' + $scope.Detail_height +
                '&Rel_price=' + $scope.product_price)
            .then(function(datos) {
                $scope.DetailsOT($scope.ID);
            });
    }

    $scope.DeleteRelac = function(a) {
        $http.get('recursos/Delete.php?Id=' + a + '&module=relation')
            .then(function(datos) {
                $scope.DetailsOT();
                $scope.init();
            });
    }

    $scope.CargarIdRelacion = function(IdRel) {
        $scope.IdRelacion = IdRel;
        $scope.CargarDatosProducto(IdRel);
    }

    $scope.UpdateOT = function(a, archivo) {
        $http.get('recursos/OT/Update.php?Id=' + a + '&imagen=' + archivo + '&detalle=' + $scope.OT_detail_modify)
            .then(function(datos) {
                $scope.init();
            });
    }

    $scope.PasarSiguienteEstado = function(a) {
        $http.get('recursos/OT/PasarDeEstado.php?Id=' + a)
            .then(function(datos) {
                $scope.CargaOT(a);
            });
    }

    $scope.addFile = function() {
        //$http.post('recursos/OT/subir.php')
        //.then(function(datos) {
        //$scope.archivo = datos.data;
        console.log($scope.archivo);
        //});
    }

    $scope.InsertOT = function(operation) {
        if ($scope.OT_date != "undefined" && $scope.OT_client != "undefined") {
            var OT_date = Date.parse($scope.OT_date);
            $http.get('recursos/OT/InsertOT.php' + '?OT_detail=' + $scope.OT_detail +
                    '&OT_Id_Client=' + $scope.OT_client +
                    '&OT_date=' + OT_date +
                    '&operation=' + operation)
                .then(function(datos) {
                    $scope.init();
                });
        }
    }

    /*
    $scope.uploadFile = function() {
        var file = $scope.myFile;
        var uploadUrl = "../server/service.php", //Url of webservice/api/server
            promise = fileUploadService.uploadFileToUrl(file, uploadUrl);

        promise.then(function(response) {
            $scope.serverResponse = response;
        }, function() {
            $scope.serverResponse = 'An error has occurred';
        })
    };





$http.get('recursos/OT/InsertOT.php' + '?Id_client=' + $scope.Id_client +
        '&OT_detail=' + $scope.OT_detail +
        '&OT_file=' + $scope.OT_file +
        '&ots_state=' + $scope.ots_state +
        '&OT_date=' + $scope.OT_date +
        '&form_id=' + $scope.ID +
        '&operation=' + operation)



$scope.getOTs = function () {
$http.get('../DevolverDatos.php?Opcion=OTs&Param=')
.then(function (datos) {
$scope.OTs = {};
$scope.OTs = datos.data;
});
}
 
$scope.getProducts = function () {
$scope.loading = true;
$http.get('../DevolverDatos.php?Opcion=Products&Param=')
.then(function (datos) {
$scope.Products = {};
$scope.Products = datos.data;
$scope.MostrarEspera = 0;
});
}
 
*/
});