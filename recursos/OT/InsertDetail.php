<?php
session_start();

$Id_client = $_GET["Id_client"];
$OT_detail = $_GET["OT_detail"];
$OT_file = $_GET["OT_file"];
$ots_state_ = $_GET["ots_state_"];
$OT_date = $_GET["OT_date"];

$sql = "INSERT INTO ots (OT_Id_Client, OT_date, OT_detail, OT_file, ots_state) VALUES ('$Id_client','$OT_detail','$OT_file','$ots_state_',$OT_date)";

$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO

//$sql = "SELECT * FROM ots WHERE OT_Id_Client=$Id_client and OT_detail=$OT_detail";
$sql = "SELECT * FROM ots WHERE OT_Id_Client=6 and OT_detail='Detalles de OT'";

$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();

$datos = $resultado->fetchAll();

$datos['Ot_Id']=$datos[0]['id'];
$datos[0]['Ot_Id']=$datos[0]['id'];

$datos['Mensaje'] = "Datos Agregados!";
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

echo $datos;
