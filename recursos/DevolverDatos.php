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
        //WORKS ORDER
    case "OTs":
        $sql = "SELECT * FROM ots";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "CargarOT":
        $sql = "SELECT * FROM ots, clients WHERE ots.id=$Parametros and ots.OT_Id_Client=clients.id";
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $datos = $resultado->fetchAll();
        break;
    case "DetailsOT":
        $sql = "SELECT rel.id, rel.Rel_Id_OT, rel.Rel_Id_product, rel.Rel_quantity, rel.Rel_width, rel.Rel_height, rel.Rel_price, rel.Rel_state, products.product_description, (Rel_quantity*Rel_height*Rel_width*Rel_quantity*Rel_price) as Total FROM rel_ot_clients as rel, products WHERE rel.Rel_Id_product=products.id AND rel.Rel_Id_OT=$Parametros";
        //"SELECT * FROM ots, clients WHERE ots.id=$Parametros and ots.OT_Id_Client=clients.id";
        //echo $sql;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $Total = 0;
        //while($row=$resultado->fetch(PDO::FETCH_ASSOC)) {
        //    $Total = $row['Rel_price'];
        //{"id":"6","0":"6","Rel_Id_OT":"1","1":"1","Rel_Id_product":"1","2":"1","Rel_quantity":"3.00","3":"3.00","Rel_width":"2.00","4":"2.00","Rel_height":"2.00","5":"2.00","Rel_price":"120.00","6":"120.00","Rel_state":"1","7":"1","product_description":"Lona","8":"Lona"}]}
        // echo $cont;
        $datos = $resultado->fetchAll();
        break;
    case "CalcularTotal":
        $sql = "SELECT rel.Rel_quantity, rel.Rel_width, rel.Rel_height, rel.Rel_price,  (Rel_quantity * Rel_height * Rel_width * Rel_quantity * Rel_price) as Total FROM rel_ot_clients as rel, products WHERE rel.Rel_Id_product=products.id AND rel.Rel_Id_OT=$Parametros";
        //$sql = "SELECT rel.id, rel.Rel_Id_OT, rel.Rel_Id_product, rel.Rel_quantity, rel.Rel_width, rel.Rel_height, rel.Rel_price, rel.Rel_state, products.product_description FROM rel_ot_clients as rel, products WHERE rel.Rel_Id_product=products.id AND rel.Rel_Id_OT=$Parametros";
        //"SELECT * FROM ots, clients WHERE ots.id=$Parametros and ots.OT_Id_Client=clients.id";
        //echo $sql;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        $Total = 0;
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)) {
            $Total = $Total + ($row['Total']);
        }
        //{"id":"6","0":"6","Rel_Id_OT":"1","1":"1","Rel_Id_product":"1","2":"1","Rel_quantity":"3.00","3":"3.00","Rel_width":"2.00","4":"2.00","Rel_height":"2.00","5":"2.00","Rel_price":"120.00","6":"120.00","Rel_state":"1","7":"1","product_description":"Lona","8":"Lona"}]}
        // echo $cont;
        //$datos = $resultado->fetchAll();
        $datos['Total']= $Total;
        break;
}

$datos = json_encode($datos);
//print_r($row);
//echo $sql;
echo $datos;
