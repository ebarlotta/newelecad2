<?php
session_start();

$Id = $_GET["Id"];
$Module = $_GET["module"];

switch ($Module) {
    case "products":
        $IdProduct = $Id;
        $sql = "DELETE FROM products WHERE Id=$IdProduct";
    case "lists":
        $IdList = $Id;
        $sql = "DELETE FROM lists WHERE Id=$IdList";
    case "forms":
        $IdForm = $Id;
        $sql = "DELETE FROM forms WHERE Id=$IdForm";
}

$datos = array();

include_once("stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
//$resultado->execute();                                ////  COMENTADO PARA QUE NO TENGA EFECTO
$datos = $resultado->fetchAll();
$datos['Mensaje'] = "Datos Eliminados!";

$datos = json_encode($datos);
echo $datos;
