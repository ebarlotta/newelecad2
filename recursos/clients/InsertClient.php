<?php
session_start();

$client_id = $_GET["client_id"];
$client_name = $_GET["client_name"];
$client_address = $_GET["client_address"];
$client_telephone = $_GET["client_telephone"];
$client_email = $_GET["client_email"];
$client_id_list = $_GET["client_id_list"];
$client_photo = $_GET["client_photo"];
$operation = $_GET["operation"];

if($operation) {
    $sql = "INSERT INTO clients (client_name, client_address,client_telephone,client_email,client_id_list,client_photo) VALUES ('$client_name','$client_address','$client_telephone','$client_email',$client_id_list,'$client_photo')";
} 
else {
    $sql = "UPDATE clients SET client_name='$client_name', client_address='$client_address', client_telephone='$client_telephone', client_email='$client_email', client_id_list=$client_id_list, client_photo='$client_photo' WHERE id=$client_id";
}
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
if($operation) { $datos['Mensaje'] = "Datos Agregados!"; } else { $datos['Mensaje'] = "Datos Modificados!"; }
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

echo $datos;
