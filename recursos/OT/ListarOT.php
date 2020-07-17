<?php
session_start();

$state = $_GET["state"];
$sql = "SELECT * FROM ots, clients WHERE ots.OT_Id_Client=clients.id and ots_state=$state ORDER BY OT_date";
//$sql = "SELECT * FROM ots WHERE ots_state=$state ORDER BY OT_date";

$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();

$datos = $resultado->fetchAll();

//$datos['Mensaje'] = "Datos Agregados!";
//$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

echo $datos;
