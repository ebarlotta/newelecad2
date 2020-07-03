<?php
$pdo = new PDO('mysql:host=localhost;dbname=barl83_barlotta', $_SESSION['user'], $_SESSION['password']);
$GLOBALS['pdo']->query("SET NAMES 'UTF8' ");                        // CORRE EN EL HOSTING
$link = mysql_connect ("localhost", $_SESSION['user'], $_SESSION['password']) or die ("No se puede conectar a la Base de Datos");

//	$pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
//	$GLOBALS['pdo']->query("SET NAMES 'UTF8' "); 
?>