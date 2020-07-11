<?php
session_start();

$IdProduct = $_GET["Id"];
$sql = "DELETE FROM products WHERE Id=$IdProduct";
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
$datos['Mensaje'] = "Datos Eliminados!";

$datos = json_encode($datos);

//console.log($datos);
//  print_r($datos);
//echo $sql;
echo $datos;
