<?php
session_start();
$MACliente=$_GET["MACliente"];
$MAFecha=date("Y-m-d",substr($_GET["MAFecha"],0,10));
$MAComprobante=$_GET["MAComprobante"];
$MADetalle=$_GET["MADetalle"];
$MAAnio=$_GET["MAAnio"];
$MAPasado=$_GET["MAPasado"];
$MAArea=$_GET["MAArea"];
$MACuenta=$_GET["MACuenta"];
$MABruto=0; // $_GET["MABruto"];
$MAParticipa='No'; //$_GET["MAParticipa"];
$MAIva=0; // $_GET["MAIva"];
$MAExento=0; // $_GET["MAExento"];
$MAImpInterno=0; // $_GET["MAImpInterno"];
$MARet=0; // $_GET["MARet"];
$MAPer=0; // $_GET["MAPer"];
$MARetGan=0; // $_GET["MARetGan"];
$MANeto=0; // $_GET["MANeto"];
$MAPagado=$_GET["MAPagado"];
$MACantidad=0; // $_GET["MACantidad"];
//$IdComp=$_GET["IdComp"];
$datos = array();
include_once("stringconexion.inc");

$a="SELECT * FROM tblAreas WHERE DescripcionAreas='$MAArea' and Empresa='".$_SESSION['CuitEmpresa']."'";
$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 
$row=$resultado->fetch();
$IdArea=$row['IdArea'];

$a="SELECT * FROM tblCuentas WHERE Descripcioncuentas='$MACuenta' and Empresa='".$_SESSION['CuitEmpresa']."'";
$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 
$row=$resultado->fetch();
$IdCuenta=$row['IdCuenta'];

$a="INSERT INTO tblVentas1 (FechaComp,CuitComp,NroComp,DetalleComp,BrutoComp,IvaComp,MontoIva,ExentoComp,ImpInternoComp,PercepcionIvaComp,NetoComp,RetencionIB,Ganancias,MontoPagadoComp,ParticipaEnIva,PasadoEnMes,CantidadLitroComp,IdArea,IdCuenta,fechamodif, Anio,Empresa) VALUES ('$MAFecha','$MACliente','$MAComprobante','$MADetalle',$MABruto,$MAIva,".($MABruto*$MAIva/100).",$MAExento,$MAImpInterno,$MAPer,$MANeto,$MARet,$MARetGan,$MAPagado,'$MAParticipa','$MAPasado',$MACantidad,'$IdArea','$IdCuenta','$MAFecha',$MAAnio,'".$_SESSION['CuitEmpresa']."')";

//echo $a;

$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 

$datos=$resultado->fetchAll();

//echo $a;

$datos=json_encode($datos);
    //print_r($row);
    echo $datos;
?>