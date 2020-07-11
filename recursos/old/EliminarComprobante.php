<?php
session_start();
$IdComp=$_GET["IdComp"];

$datos = array();
include_once("stringconexion.inc");

$a="DELETE FROM tblVentas1 WHERE IdComp=$IdComp";
$resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); 
$row=$resultado->fetch();

//echo $a;

$datos=json_encode($datos);
    //print_r($row);
    echo $datos;
?>