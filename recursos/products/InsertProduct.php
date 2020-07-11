<?php
session_start();

$product_id = $_GET["product_id"];
$product_description = $_GET["product_description"];
$product_price = $_GET["product_price"];
$unity = $_GET["product_unity"];
$list = $_GET["product_id_list"];
$operation = $_GET["operation"];

if($operation) {
    $sql = "INSERT INTO products (product_description, product_price, product_unity, product_id_list) VALUES ('$product_description',$product_price,$unity,$list)";
} 
else {
    $sql = "UPDATE products SET product_description='$product_description', product_price=$product_price, product_unity=$unity, product_id_list=$list WHERE id=$product_id";
}
$datos = array();

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
if($operation) { $datos['Mensaje'] = "Datos Agregados!"; } else { $datos['Mensaje'] = "Datos Modificados!"; }
$datos['Mensaje2'] = $sql;

$datos = json_encode($datos);

//console.log($datos);
//  print_r($datos);
//echo $sql;
echo $datos;
