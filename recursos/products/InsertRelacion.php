<?php
session_start();

$Rel_Id_OT = $_GET["Rel_Id_OT"];
$Rel_Id_product = $_GET["Rel_Id_product"];
$Rel_quantity = $_GET["Rel_quantity"];
$Rel_width = $_GET["Rel_width"];
$Rel_height = $_GET["Rel_height"];
$Rel_price = $_GET["Rel_price"];
$Rel_state = 1;

$sql = "INSERT INTO rel_ot_clients (Rel_Id_OT, Rel_Id_product, Rel_quantity, Rel_width, Rel_height, Rel_price, Rel_state) VALUES ($Rel_Id_OT, $Rel_Id_product, $Rel_quantity, $Rel_width, $Rel_height, $Rel_price, $Rel_state)";

$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();

$datos['Mensaje'] = "Datos Agregados!";

$datos = json_encode($datos);
//echo $sql;
echo $datos;
