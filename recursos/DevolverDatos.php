<?php
session_start();
$Opcion=$_GET["Opcion"];
$Parametros=$_GET["Param"];

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    
switch ($Opcion) {
    /*case "inicializar" :
        $sql = "SELECT * FROM tblClientes WHERE 1 and Empresa=". $_SESSION['CuitEmpresa'] . " ORDER BY NombreCliente";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute(); // CORRE EN EL HOSTING
        $datos=$resultado->fetchAll();          //CORRE EN EL HOSTING
        break;
        case "Areas" :
        $sql = "SELECT * FROM tblAreas WHERE 1 and Empresa=". $_SESSION['CuitEmpresa'] . " ORDER BY DescripcionAreas";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute(); // CORRE EN EL HOSTING
        $datos=$resultado->fetchAll();          //CORRE EN EL HOSTING
        break;
        case "Cuentas" :
        $sql = "SELECT * FROM tblCuentas WHERE 1 and Empresa=". $_SESSION['CuitEmpresa'] . " ORDER BY DescripcionCuentas";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute(); // CORRE EN EL HOSTING
        $datos=$resultado->fetchAll();          //CORRE EN EL HOSTING
        break;
        case "Filtro" :
        $sql = "SELECT FechaComp as Fecha FROM tblVentas1 WHERE 1 and Empresa=". $_SESSION['CuitEmpresa'];
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute(); // CORRE EN EL HOSTING
        $datos=$resultado->fetchAll();
        break;*/
    case "Unities" :
        $sql="SELECT * FROM unitys";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute();
        $datos=$resultado->fetchAll();
        break;
    case "Lists" :
        $sql="SELECT * FROM lists";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute();
        $datos=$resultado->fetchAll();
        break;
    case "Products" :
        $sql="SELECT products.id, products.product_description,products.product_price,unitys.unity_description, unitys.unity_signed, lists.list_name, lists.list_description FROM products, unitys, lists WHERE products.product_unity=unitys.id and products.product_id_list=lists.id";
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute();
        $datos=$resultado->fetchAll();
        break;
        //echo $sql;
    }

    $datos=json_encode($datos);
    //print_r($row);
    echo $datos;
?>