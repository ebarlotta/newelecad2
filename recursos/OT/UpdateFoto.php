<?php
session_start();

$OT_Id = $_GET["OT_id"];
$Nombre = $_GET["nombre"];
//$Nombre = $_FILES["fileToUpload"]["name"];

$sql = "UPDATE ots SET OT_file='$Nombre' WHERE id=$OT_Id";

include_once("../stringconexion.inc");
$resultado = $GLOBALS['pdo']->prepare($sql);
$resultado->execute();
?>