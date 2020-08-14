<?php
session_start();

$list_id = $_GET["list_id"];
$list_name = $_GET["list_name"];
$list_description = $_GET["list_description"];
$operation = $_GET["operation"];

if($operation) {
    $sql = "INSERT INTO lists (list_name, list_description) VALUES ('$list_name','$list_description')";
} 
else {
    $sql = "UPDATE lists SET list_name='$list_name', list_description='$list_description' WHERE id=$list_id";
}
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
if($operation) { $datos['Mensaje'] = "Datos Agregados!"; } else { $datos['Mensaje'] = "Datos Modificados!"; }
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

//console.log($datos);
//  print_r($datos);
//echo $sql;
echo $datos;
