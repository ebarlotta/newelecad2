<?php
session_start();
$Opcion = $_GET["Opcion"];
$Parametros = $_GET["Param"];

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    
switch ($Opcion) {
    case "Unities":
        $sql = "SELECT * FROM unitys";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "Products":
        $sql = "SELECT products.id, products.product_description,products.product_price,unitys.unity_description, unitys.unity_signed, lists.list_name, lists.list_description FROM products, unitys, lists WHERE products.product_unity=unitys.id and products.product_id_list=lists.id";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "GetProductId":
        $sql = "SELECT * FROM products WHERE id=" . $Parametros;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;

        // LISTS
    case "Lists":
        $sql = "SELECT * FROM lists";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "GetListId":
        $sql = "SELECT * FROM lists WHERE id=" . $Parametros;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;

        //FORMS
    case "Forms":
        $sql = "SELECT * FROM forms";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "GetFormId":
        $sql = "SELECT * FROM forms WHERE id=" . $Parametros;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
        //CLIENTS
    case "Clients":
        $sql = "SELECT clients.id, clients.client_name, clients.client_address, clients.client_telephone, clients.client_email, clients.client_photo, lists.list_name FROM clients, lists WHERE clients.client_id_list=lists.id";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "GetClientId":
        $sql = "SELECT * FROM clients WHERE id=" . $Parametros;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
}

$datos = json_encode($datos);
//print_r($row);
echo $datos;
