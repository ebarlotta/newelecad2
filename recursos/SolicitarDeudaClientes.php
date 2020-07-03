<?php
session_start();

$Meses = [ "Jan"=>"01", "Feb"=>"02", "Mar"=>"03", "Abr"=>"04", "May"=>"05", "Jun"=>"06", "Jul"=>"07", "Aug"=>"08", "Sep"=>"09", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12" ];

$Desde=""; $Hasta=""; $DeudaAnio=""; $mas="";

$DeudaAnio=$_GET["Anio"];

$Desde=$_GET["Desde"];
$a=substr($Desde,4,3);
$Desde=substr($Desde,11,4)."-".$Meses["$a"]."-".substr($Desde,8,2);

$Hasta=$_GET["Hasta"];
$a=substr($Hasta,4,3);
$Hasta=substr($Hasta,11,4)."-".$Meses["$a"]."-".substr($Hasta,8,2);

$CmbDeuda=$_GET["Unidad"];

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    

if ($CmbDeuda=="Todos")
		{$mas="";}
	else 
	   { if($CmbDeuda<>"undefined") { $mas=" DescripcionAreas='" . $CmbDeuda. "'"; }
	}
	if ($DeudaAnio=="Todos") 
	   {   }
	else { if (strlen($mas>1)) { $mas=$mas." and Anio=".$DeudaAnio; }
	       else { $mas=$mas." Anio='".$DeudaAnio . "'";}
	}
	if (strlen($mas)) { $mas=$mas." and Empresa='".$_SESSION['CuitEmpresa']."'"; }
	//else { $mas=$mas." Empresa='".$Empresa."'";}
	else { $mas=$mas." Empresa='".$_SESSION['CuitEmpresa']."'";}

	if (strlen($mas)) {$mas=" WHERE ".$mas;}
	$sSql="SELECT CuitComp as NombreCliente,Cuit, Saldo as Deuda FROM (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, CuitComp, Cuit FROM ViewComprobantesVentas ".$mas." and FechaComp>='".$Desde."' and FechaComp<='".$Hasta."' GROUP BY CuitComp) as f WHERE Saldo>1";
	//$sSql="SELECT CuitComp as NombreProveedor,Cuit, Saldo as Deuda FROM (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, CuitComp, Cuit FROM ViewComprobantes ".$mas." GROUP BY CuitComp) as f WHERE Saldo>1";

 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
	$TotalDeuda=0;


	while($row = $stmt->fetch()) {
		$datos[]=array("NombreCliente"=>$row["NombreCliente"],"Deuda"=>$row["Deuda"]);
		$TotalDeuda=$TotalDeuda+$row["Deuda"];
	}

	//echo $sSql;
	$datos['TotalDeuda'] = $TotalDeuda;

	$datos=json_encode($datos);
    //print_r($datos);
    echo $datos;


	/*$p=$sSql;
	$p="<table border=1>
		<tr bgcolor=\"#b0e3ff\"><td align=\"center\">Nombre</td><td align=\"center\">Cuit</td><td align=\"center\">Deuda</td></tr>";
 	while($row=$stmt->fetch()) {
		$p=$p."<tr><td>$row[NombreProveedor]</td><td>$row[Cuit]</td><td align='right'>$row[Deuda]</td></tr>";
		$Acumulado=$Acumulado+$row[Deuda];
	}
	$p=$p."<tr bgcolor=\"#A4FF9C\"><td colspan=2 align='right'>Total Deuda a Proveedores</td><td>$Acumulado</td></tr>";
	*/
	?>