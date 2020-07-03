<?php
session_start();
$MMCliente=$_GET["MMCliente"];
$MMFecha=date("Y-m-d",substr($_GET["MMFecha"],0,10));

//echo $_GET["MMFecha"];
//$MMFecha=$_GET["MMFecha"];
$MMComprobante=$_GET["MMComprobante"];
$MMDetalle=$_GET["MMDetalle"];
$MMAnio=$_GET["MMAnio"];
$MMPasado=$_GET["MMPasado"];
$MMArea=$_GET["MMArea"];
$MMCuenta=$_GET["MMCuenta"];
$MMBruto=$_GET["MMBruto"];
$MMParticipa=$_GET["MMParticipa"];
$MMIva=$_GET["MMIva"];
$MMExento=$_GET["MMExento"];
$MMImpInterno=$_GET["MMImpInterno"];
$MMRet=$_GET["MMRet"];
$MMPer=$_GET["MMPer"];
$MMRetGan=$_GET["MMRetGan"];
$MMNeto=$_GET["MMNeto"];
$MMPagado=$_GET["MMPagado"];
$MMCantidad=$_GET["MMCantidad"];
$IdComp=$_GET["IdComp"];
$datos = array();
include_once("stringconexion.inc");

$a="SELECT * FROM tblAreas WHERE DescripcionAreas='$MMArea' and Empresa='".$_SESSION['CuitEmpresa']."'";
$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 
$row=$resultado->fetch();
$IdArea=$row['IdArea'];

$a="SELECT * FROM tblCuentas WHERE Descripcioncuentas='$MMCuenta' and Empresa='".$_SESSION['CuitEmpresa']."'";
$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 
$row=$resultado->fetch();
$IdCuenta=$row['IdCuenta'];



$a="UPDATE tblVentas1 SET FechaComp='$MMFecha',CuitComp='$MMCliente',NroComp='$MMComprobante',DetalleComp='$MMDetalle',BrutoComp=$MMBruto,IvaComp=$MMIva,MontoIva=".($MMBruto*$MMIva/100).",ExentoComp=$MMExento,ImpInternoComp=$MMImpInterno,PercepcionIvaComp=$MMRet,NetoComp=$MMNeto,RetencionIB=$MMPer,Ganancias=$MMRetGan,MontoPagadoComp=$MMPagado,ParticipaEnIva='$MMParticipa',PasadoEnMes='$MMPasado',CantidadLitroComp=$MMCantidad,IdArea='$IdArea',IdCuenta='$IdCuenta',fechamodif='$MMFecha', Anio=$MMAnio,Empresa='".$_SESSION['CuitEmpresa']."' WHERE IdComp=" .$IdComp;
 //echo $a;

$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 

$datos=$resultado->fetchAll();

//echo $a;

$datos=json_encode($datos);
    //print_r($row);
    echo $datos;
?>