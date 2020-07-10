var misDatos = angular.module('datosApp', []);

misDatos.controller('productController',function($scope,$http){

    // CONTROLADOR DE PRODUCTOS
    //------------------------

    $scope.init = function(){
        $scope.show();
    }

    $scope.show = function(){
//        console.log('termino');
    	$scope.loading=true;
        $http.get('../DevolverDatos.php?Opcion=Products&Param=')
        .then(function(datos){
            $scope.Products={};

            $scope.Products=datos.data;

            $scope.MostrarEspera=0;
        });
    }

    // CREATEinit
    $scope.InitCreate = function(){
        $scope.texto="este es el texto";
        console.log($scope.texto);
        $http.get('../DevolverDatos.php?Opcion=Lists&Param=')
        .then(function(datos){
            console.log(data);
            $scope.Lists={};
            $scope.Lists=datos.data;
        });
        

    }
});
