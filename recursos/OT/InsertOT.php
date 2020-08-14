<?php
session_start();

$OT_Id_Client = $_GET["OT_Id_Client"];
$OT_detail = $_GET["OT_detail"];

$OT_date = $_GET["OT_date"];
$OT_date = date("Y-m-d", substr($OT_date, 0, 10));


$ots_state = 1;

$sql = "INSERT INTO ots (OT_Id_Client, OT_date, OT_detail, OT_file, ots_state) VALUES ('$OT_Id_Client','$OT_date','$OT_detail','',$ots_state)";

$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
echo $sql;
//$sql = "SELECT * FROM ots WHERE OT_Id_Client=$Id_client and OT_detail=$OT_detail";
$sql = "SELECT * FROM ots WHERE OT_Id_Client=6 and OT_detail='Detalles de OT'";

$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();

$datos = $resultado->fetchAll();

$ID = $datos[0][0];
//$datos['Ot_Id']=$datos[0]['id'];
//$datos[0]['Ot_Id']=$datos[0]['id'];

$datos['Ot_Id']=$ID;
$datos[0]['Ot_Id']=$ID;

$datos['Mensaje'] = "Datos Agregados!";
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

echo $datos;
