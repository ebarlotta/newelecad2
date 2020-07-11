<?php
session_start();
$IdCliente=$_GET["IdCliente"];
$Mes=$_GET["Mes"];
$Participa=$_GET["Participa"];
$IdArea=$_GET["IdArea"];
$IdCuenta=$_GET["IdCuenta"];
$Anio=$_GET["Anio"];
$Detalle=$_GET["Detalle"];

$datos = array();
include_once("stringconexion.inc");  // CORRE EN EL HOSTING    
$a='';
        if ($Mes<>"undefined" and $Mes<>"null" and $Mes<>"") {
		  if ($Mes<>"") {
		  	if ($a<>"") { $a=$a." and "; }
		  	$a=$a." PasadoEnMes='$Mes' "; 
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

		if ($Anio<>"undefined" and $Anio<>"null" and $Anio<>"") {
		  if ($a<>"") { $a=$a." and "; }
		  	//echo $a;
		  $a=$a." Anio='$Anio' ";
		}

		if ($a<>"") { $a=$a." and "; $a=$a." tblVentas1.Empresa='".$_SESSION['CuitEmpresa']."' and";}

		// Esto llena solo el combo del detalle
		  $x="SELECT DISTINCT DetalleComp FROM ViewComprobantesVentas WHERE ". $a . " ORDER BY DetalleComp";

		if ($Detalle<>"undefined") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DetalleComp='".$Detalle."' ";
		}

$b='';
		if ($IdCliente<>"undefined") {
		  if ($IdCliente<>"") { 
		  	$b=$b." and "; 
		    $b=$b." NombreCliente like '%$IdCliente%' "; 
		  }
		}
		$a="SELECT tblVentas1.IdComp, tblVentas1.FechaComp as Fecha, tblVentas1.NroComp as Comprobante, tblClientes.Cuit as Cuit, tblClientes.NombreCliente as Cliente, tblVentas1.DetalleComp as Detalle, tblVentas1.BrutoComp as Bruto, tblVentas1.BrutoComp*tblVentas1.IvaComp/100 as Iva, tblVentas1.ExentoComp as Exento, tblVentas1.ImpInternoComp as ImpInterno, tblVentas1.PercepcionIvaComp as Percepcion, tblVentas1.RetencionIB as Retencion, tblVentas1.Ganancias as Ganancia, tblVentas1.NetoComp as Neto, tblVentas1.MontoPagadoComp as Pagado, tblVentas1.CantidadLitroComp as Cantidad, tblVentas1.ParticipaEnIva as Participa, tblVentas1.PasadoEnMes as Mes, tblAreas.DescripcionAreas as Area, tblCuentas.DescripcionCuentas as Cuenta, tblVentas1.Empresa as Empresa FROM tblVentas1, tblAreas, tblCuentas, tblClientes WHERE ". $a." tblVentas1.IdArea = tblAreas.IdArea and tblVentas1.IdCuenta = tblCuentas.IdCuenta and tblVentas1.CuitComp = tblClientes.NombreCliente " . $b . " and tblClientes.Empresa=tblVentas1.Empresa ORDER by Fecha, Comprobante";

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
            /*$datos[$R]['Bruto']=$row['Bruto'];
            $datos[$R]['Cantidad']=$row['Cantidad'];
            $datos[$R]['Cliente']=$row['Cliente'];
            $datos[$R]['Comprobante']=$row['Comprobante'];
            $datos[$R]['Cuenta']=$row['Cuenta'];
            $datos[$R]['Cuit']=$row['Cuit'];
            $datos[$R]['Detalle']=$row['Detalle'];
            $datos[$R]['Empresa']=$row['Empresa'];
            $datos[$R]['Exento']=$row['Exento'];
            $datos[$R]=$row['Fecha'];
            $datos[$R]=$row['Ganancia'];
            $datos[$R]=$row['IdComp'];
            $datos[$R]=$row['ImpInterno'];
            $datos[$R]=$row['Iva'];
            $datos[$R]=$row['Mes'];
            $datos[$R]=$row['Neto'];
            $datos[$R]=$row['Pagado'];
            $datos[$R]=$row['Participa'];
            $datos[$R]=$row['Percepcion'];
            $datos[$R]=$row['Retencion'];*/
        	
        	//$R++;
        	
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
        $datos['TotalBruto'] = $TotalBruto;
        $datos['TotalIva'] = $TotalIva;
        $datos['TotalExento'] = $TotalExento;
        $datos['TotalImpInterno'] = $TotalImpInterno;
        $datos['TotalPercepcion'] = $TotalPercepcion;
        $datos['TotalRetencion'] = $TotalRetencion;
        $datos['TotalGanancia'] = $TotalGanancia;
        $datos['TotalNeto'] = $TotalNeto;
        $datos['TotalPagado'] = $TotalPagado;
        $datos['TotalCantidad'] = $TotalCantidad;
        $datos['TotalSaldo'] = $TotalNeto-$TotalPagado;
        //echo "Bruto " . $datos['Bruto'];
    //echo $a;
    $datos=json_encode($datos);
    //print_r($datos);
    echo $datos;
?>