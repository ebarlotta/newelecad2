<?php
session_start();

$form_id = $_GET["form_id"];
$forma_description = $_GET["forma_description"];
$forma_increment = $_GET["forma_increment"];
$operation = $_GET["operation"];

if($operation) {
    $sql = "INSERT INTO forms (forma_description, forma_increment) VALUES ('$forma_description',$forma_increment)";
} 
else {
    $sql = "UPDATE lists SET forma_description='$forma_description', forma_increment=$forma_increment WHERE id=$form_id";
}
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
if($operation) { $datos['Mensaje'] = "Datos Agregados!"; } else { $datos['Mensaje'] = "Datos Modificados!"; }
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);
echo $datos;
