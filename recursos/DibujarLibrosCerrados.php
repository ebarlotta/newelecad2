<?php
session_start();

include_once("stringconexion.inc"); 
$Anio=$_GET["Anio"];
$datos = array();

//$sSql="SELECT PasadoEnMes, Max(Cerrado) as Cerrado FROM tblComprobantes WHERE ParticipaEnIva='Si' and Anio='$Anio' and Empresa='".$_SESSION['CuitEmpresa']."' GROUP BY Anio,PasadoEnMes ORDER BY FechaComp";
$sSql="SELECT PasadoEnMes as MesLibroCerrado, Cerrado as EstadoLibroCerrado FROM tblComprobantes WHERE ParticipaEnIva='Si' and Anio='$Anio' and Empresa='".$_SESSION['CuitEmpresa']."' GROUP BY Anio,PasadoEnMes ORDER BY FechaComp";
$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();

while($row = $stmt->fetch()) {
	$datos[]=$row;
	/*$datos['MesLibroCerrado']=$row['PasadoEnMes'];
	if($row['Cerrado']) { 
		$datos['EstadoLibroCerrado']='CERRADO'; 
	} else {
		$datos['EstadoLibroCerrado']='ABIERTO'; 
	}*/
}

/*<div class=\"contenedor-fila\">
        <div class=\"contenedor-columna\"></div>
	        <div class=\"contenedor-columna-cerrado\">CERRADO
   		    <div class=\"contenedor-columna\">ABIERTO</div>
    	</div>
	</div>*/
//
	$datos=json_encode($datos);
    //print_r($datos);
    echo $datos;
