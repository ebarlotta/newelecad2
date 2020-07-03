<?php
session_start();
$Opcion=$_GET["Opcion"];
$Parametros=$_GET["Param"];

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    
switch ($Opcion) {
    case "inicializar" :
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
        //print_r($resultado);
        $datos=$resultado->fetchAll();
        //$datos=$row['Fecha'];
        /*while ($row=$resultado->fetchAll()) {
            $datos['Fecha']=$row;
            $datos['Fecha']=$row;
        }*/

        //$datos=$resultado->fetchAll();          //CORRE EN EL HOSTING
        break;
    case "CargarDatosComprobantes" :
        $sql="SELECT * FROM tblVentas1, tblCuentas, tblAreas, tblClientes WHERE tblClientes.NombreCliente=tblVentas1.CuitComp and tblCuentas.IdCuenta=tblVentas1.IdCuenta and tblAreas.IdArea=tblVentas1.IdArea and tblClientes.Empresa='".$_SESSION["CuitEmpresa"]."' and IdComp=".$Parametros;
        $resultado = $GLOBALS['pdo']->prepare($sql); $resultado->execute();
        $datos=$resultado->fetchAll();
        //echo $sql;
    }


    $datos=json_encode($datos);
    //print_r($row);
    echo $datos;
?>