<?php
session_start();
$IdCliente=$_GET["IdCliente"];
$Mes=$_GET["Mes"];
$Participa=$_GET["Participa"];
$IdArea=$_GET["IdArea"];
$IdCuenta=$_GET["IdCuenta"];
$Anio=$_GET["Anio"];
$Detalle=$_GET["Detalle"];

$Meses = [ "Jan"=>"01", "Feb"=>"02", "Mar"=>"03", "Abr"=>"04", "May"=>"05", "Jun"=>"06", "Jul"=>"07", "Aug"=>"08", "Sep"=>"09", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12" ];

$Desde=$_GET["Desde"];
$a=substr($Desde,4,3);
$Desde=substr($Desde,11,4)."-".$Meses["$a"]."-".substr($Desde,8,2);

$Hasta=$_GET["Hasta"];
$a=substr($Hasta,4,3);
$Hasta=substr($Hasta,11,4)."-".$Meses["$a"]."-".substr($Hasta,8,2);

$IVA=$_GET["IVA"];
$Asc=$_GET["Asc"];

$j='';

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    
$a='';
        if ($Mes<>"undefined" and $Mes<>"null" and $Mes<>"") {
		  if ($Mes<>"") {
		  	if ($a<>"") { $a=$a." and "; }
		  	$a=$a." tblVentas1.PasadoEnMes='$Mes' "; 
		  }
		}

		if ($Participa<>"undefined" and $Participa<>"null" and $Participa<>"") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." tblVentas1.ParticipaEnIva='$Participa' ";
		}
		if ($IdArea<>"undefined" and $IdArea<>"null" and $IdArea<>"") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." tblVentas1.IdArea='$IdArea' ";
		}

		if ($IdCuenta<>"undefined" and $IdCuenta<>"null" and $IdCuenta<>"") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." tblVentas1.IdCuenta='$IdCuenta' ";
		}
		if ($Desde<>"undefined" and $Desde<>"null" and $Desde<>"") {
			  if ($a<>"") { $a=$a." and "; }
			  $a=$a." tblVentas1.FechaComp>='$Desde' ";
			}

			if ($Hasta<>"undefined" and $Hasta<>"null" and $Hasta<>"") {
			  if ($a<>"") { $a=$a." and "; }
			  $a=$a." tblVentas1.FechaComp<='$Hasta' ";
			}

			if ($Anio<>"undefined" and $Anio<>"null" and $Anio<>"") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." tblVentas1.Anio='$Anio' ";
		}

		if ($IVA<>"undefined") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." PorcIva='$IVA' ";
		}
		if ($Asc=="undefined") {
			$j=" ASC ";
		} else {
		  	if ($Asc==true) { $j= " ASC "; } else { $j= " DESC "; }
		}
		

		if ($a<>"") { $a=$a." and "; $a=$a." tblVentas1.Empresa='".$_SESSION['CuitEmpresa']."' and";}

		// Esto llena solo el combo del detalle
		  $x="SELECT DISTINCT DetalleComp FROM ViewComprobantesVentas WHERE ". $a . " ORDER BY DetalleComp";

		if ($Detalle<>"undefined") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DetalleComp='".$Detalle."' ";
		}
		//$a="SELECT * FROM tblClientes, tblVentas1 WHERE tblVentas1.CuitComp=tblClientes.NombreCliente ";
		//$a="SELECT FechaComp as Fecha FROM tblVentas1, tblAreas, tblCuentas WHERE tblVentas1.IdArea=tblAreas.IdArea and tblVentas1.IdCuenta=tblCuentas.IdCuenta and tblVentas1.Empresa='".$_SESSION['CuitEmpresa']."' and $a ORDER by IdComp";

$b='';
		if ($IdCliente<>"undefined") {
		  if ($IdCliente<>"") { 
		  	$b=$b." and "; 
		    $b=$b." NombreCliente like '$IdCliente%' "; 
		  }
		}

		$a="SELECT tblVentas1.IdComp, tblVentas1.FechaComp as Fecha, tblVentas1.NroComp as Comprobante, tblClientes.Cuit as Cuit, tblClientes.NombreCliente as Cliente, tblVentas1.DetalleComp as Detalle, tblVentas1.BrutoComp as Bruto, tblVentas1.MontoIva as Iva, tblVentas1.ExentoComp as Exento, tblVentas1.ImpInternoComp as ImpInterno, tblVentas1.PercepcionIvaComp as Percepcion, tblVentas1.RetencionIB as Retencion, tblVentas1.Ganancias as Ganancia, tblVentas1.NetoComp as Neto, tblVentas1.MontoPagadoComp as Pagado, tblVentas1.CantidadLitroComp as Cantidad, tblVentas1.ParticipaEnIva as Participa, tblVentas1.PasadoEnMes as Mes, tblAreas.DescripcionAreas as Area, tblCuentas.DescripcionCuentas as Cuenta, tblVentas1.Empresa as Empresa FROM tblVentas1, tblAreas, tblCuentas, tblClientes WHERE ". $a." tblVentas1.IdArea = tblAreas.IdArea and tblVentas1.IdCuenta = tblCuentas.IdCuenta and tblVentas1.CuitComp = tblClientes.NombreCliente " . $b . " ORDER by Fecha, Comprobante".$j;

		//$a="SELECT FechaComp as Fecha FROM ViewComprobantesVentas WHERE ".$a." and EmpresaProveedor='".$_SESSION['CuitEmpresa']."' ORDER BY Anio,FechaComp,NroComp,CuitComp,DetalleComp";

		//echo $a;

		$TotalBruto=0;
		$TotalIva=0;
		$TotalExento=0;
		$TotalImpInterno=0;
		$TotalPercepcion=0;
		$TotalRetencion=0;
		$TotalGanancia=0;
		$TotalNeto=0;
		$TotalPagado=0;
		$TotalCantidad=0;

        $resultado = $GLOBALS['pdo']->prepare($a); $resultado->execute(); // CORRE EN EL HOSTING
        while($row=$resultado->fetch()) {
        	$datos[]=$row;
        	$TotalBruto=$TotalBruto+$row['Bruto'];
        	$TotalIva=$TotalIva+$row['Iva'];
        	$TotalExento=$TotalExento+$row['Exento'];
        	$TotalImpInterno=$TotalImpInterno+$row['ImpInterno'];
        	$TotalPercepcion=$TotalPercepcion+$row['Percepcion'];
        	$TotalRetencion=$TotalRetencion+$row['Retencion'];
        	$TotalGanancia=$TotalGanancia+$row['Ganancia'];
        	$TotalNeto=$TotalNeto+$row['Neto'];
        	$TotalPagado=$TotalPagado+$row['Pagado'];
        	$TotalCantidad=$TotalCantidad+$row['Cantidad'];

        }
        //$datos=$resultado->fetchAll();          //CORRE EN EL HOSTING
        $datos['TotalBruto2'] = $TotalBruto;
        $datos['TotalIva2'] = $TotalIva;
        $datos['TotalExento2'] = $TotalExento;
        $datos['TotalImpInterno2'] = $TotalImpInterno;
        $datos['TotalPercepcion2'] = $TotalPercepcion;
        $datos['TotalRetencion2'] = $TotalRetencion;
        $datos['TotalGanancia2'] = $TotalGanancia;
        $datos['TotalNeto2'] = $TotalNeto;
        $datos['TotalPagado2'] = $TotalPagado;
        $datos['TotalCantidad2'] = $TotalCantidad;
        $datos['TotalSaldo2'] = $TotalNeto-$TotalPagado;
        //echo "Bruto " . $datos['Bruto'];
    $datos=json_encode($datos);
    //print_r($datos);
    echo $datos;
?>