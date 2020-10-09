<?php
session_start();

$IdOrdenTrabajo = $_GET["Id"];
$Estado = $_GET["Estado"];

//$sql = "UPDATE ots SET ots_state=ots_state+1 WHERE id=" . $IdOrdenTrabajo;
$sql = "UPDATE ots SET ots_state=$Estado WHERE id=" . $IdOrdenTrabajo;
//echo $sql;
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO

$datos = $resultado->fetchAll();

$datos['Mensaje'] = "Estado Modificado!";

$datos = json_encode($datos);

echo $datos;
