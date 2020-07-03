<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html ng-app="datosApp">
<?php 
    $_SESSION['Modulo']="V E N T A S";
    include "../navbar.php"; //prueba
?>
<head><title>Comprobantes de Ventas</title>
	<meta charset="utf-8">
	<title>Gestionar Empresas</title>
	<script type="text/javascript" src="bootstrap/angular.min.js"></script>
	
	<script type="text/javascript" src="CtrlVentas.js">  </script>
    	<meta http-equiv=amp;quot;X-UA-Compatibleamp;quot; content=amp;quot;IE=edgeamp;quot;>
		<meta name=amp;quot;viewportamp;quot; content=amp;quot;width=device-width, initial-scale=1amp;quot;>
		<meta name="viewport" content="width=device-width, initial - scale=1.0">
		
		<!-- Librerias para generar PDF -->
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.4/angular.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		

		<link href = "bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href = "bootstrap/css/bootstrap.css" rel="stylesheet">

    	<!-- FORMULARIO MODAL -->
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<!-- MASCARA -->
		<script src="bootstrap/maskedinput.js"></script>
		<!--<script src="script.js"></script>-->
		<script src="bootstrap/mask.js"></script>
		<!-- MASCARA PARA NUMEROS -->
		<!-- <script src="bootstrap/jquery.js" type="text/javascript"></script>-->
		<script src="bootstrap/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="bootstrap/jquery.maskMoney.js" type="text/javascript"></script>

		<script>
		    jQuery(function($){
		    	//$("#MABruto").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MAExento").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MAImpInterno").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MAPerc").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MARet").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MARetGan").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MANeto").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MAPagado").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
		    	//$("#MACantidad").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
			})
		</script>

		<style type="text/css"> 
			.Titulo {
			  display: inline-block;
			  box-sizing: content-box;
			  font-size: 10px;
			  padding: 5px
			  font-family: arial;
			}
			.table > tbody > tr > td {
			  padding: 0 !important;
			}
		</style>
    </head>

<body ng-controller="controladorVentas" ng-init="inicializar();" style="font-size: 1.7em;">
			<div ng-show="MostrarEspera" style="z-index:100; position:fixed !important; bottom: 50% !important; right: 50% !important;">
				<img src="images/Espera.gif" width="200px;" height="200px;" style="border-radius: 20px;">
			</div>
	    
<div class="container" style="width:100%; margin-top: -20px;"">
  <ul class="nav nav-tabs" style="padding-top:5px;font-size: 0.8em;">
  		<li style="background:#F2F2F2;" class="active"><a data-toggle="tab" href="#tab1">Administrar Comprobantes</a></li> 
        <li style="background:#F6CED8;" ><a data-toggle="tab" href="#tab2" style="background:#F2F2F2;">Cuentas Corrientes</a></li> 
        <li style="background:#ECCEF5;" ><a data-toggle="tab" href="#tab3">Deuda a Proveedores</a></li> 
        <li style="background:#CECEF6;" ><a data-toggle="tab" href="#tab4">Credito de Proveedores</a></li>
        <li style="background:#CEF6CE;" ><a data-toggle="tab" href="#tab5">Deuda area/sector</a></li> 
        <li style="background:#F6E3CE;" ><a data-toggle="tab" href="#tab6">Libro de Iva</a></li>
		<li style="background:#F5BCA9;" ><a data-toggle="tab" href="#tab7">Cerrar Libros Iva</a></li> 
    </ul>
<div class="tab-content">

<div id="tab1" style="background:#F2F2F2;" class="tab-pane fade active in">
	<div class="row col-md-12" style="background:#F2F2F2; padding-top:5px;">
	</div>
		<!--    ACA COMIENZA EL FILTRO   
				--------------------- -->

	<div class="row col-md-12" style="background-color:#E3F2CE; padding-top:0px; padding-bottom:5px;background-color:#E3F2CE;margin-top: -2px;">
		<div class="col-md-1 col-xs-4" style="padding-left: 4; padding-right:0px;">
			<descripcion class="Titulo">.</descripcion><br>
			<button type="button" class="cols1 btn btn-success col-md-1" data-toggle="modal" data-target="#myModalAgregarComprobante" style="padding-right: 56px;padding-left: 9px;">Agregar</button>
		</div>
    	<div class="col-md-1 col-xs-5" style="padding-right: 0px;padding-left: 0px;margin-left: -8px;">
        	<descripcion class="Titulo">  Mes</descripcion><br>
			<select class="form-control" ng-model="FMes" style="max-width : 120px;padding-left: 12px;" ng-change="alert('pepe');showWaitFiltro();">
				<option value=""></option><option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
			</select>
		</div>
    	<div class="col-md-2 col-xs-8">
        	<descripcion class="Titulo">Cliente</descripcion><br>
        	<input type="text" ng-model="search" class="form-control" ng-change="showWaitFiltro();">
		</div>
    	<div class="col-md-1 col-xs-4">
        	<descripcion class="Titulo">ParticIva</descripcion>
			<select ng-model="FParticipa" class="form-control" ng-change="showWaitFiltro();">
				<option value="Si">Si</option><option value="No">No</option><option value="Ganancias">Ganancias</option><option value="IB">IB</option><option value="BsPersonal">BsPersonal</option>
			</select>
		</div>
    	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Detalle</descripcion>
			<input  ng-model="FDetalle" ng-change="showWaitFiltro();" type="text" style="font-size:10px;" class="form-control">        	
		</div>
    	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Area</descripcion>
        	<select class="form-control" ng-model="FArea" ng-change="showWaitFiltro();" ng-options="cmbFArea.DescripcionAreas for cmbFArea in Areas.data" ng-change="LlamarFiltro();">
        	</select>
		</div>
    	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Cuenta</descripcion>
        	<!--<select class="form-control" ng-model="FCuenta" ng-options="cmbFCuenta.DescripcionCuentas for cmbFCuenta in Cuentas.data" ng-change="LlamarFiltro();"><option value=""></option>-->
    		<!-- <select class="form-control" ng-model="FCuenta" ng-options="cmbFCuenta.DescripcionCuentas for cmbFCuenta in Cuentas.data" ng-change="LlamarFiltro();">-->
    		<select class="form-control" ng-model="FCuenta" ng-change="showWaitFiltro();">
    			<option value=""></option>
    			<option ng-repeat="x in Cuentas.data" value="{{x.IdCuenta}}">{{x.DescripcionCuentas}}</option>
    		</select>
		</div>
    	<div class="col-md-1 col-xs-4">
        	<descripcion class="Titulo">A&ntilde;o</descripcion>
			<select ng-model="FAnio" class="form-control Campo" id="Anio" style="font-size:10px;min-width:110%;" name="Anio" ng-change="showWaitFiltro();">
    			<option value="2020">2020</option><option value="2019">2019</option><option>2018</option><option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option><option>2012</option>
    		</select>
    	</div>
    </div>
	<div class="row col-md-12" style="background-color:#E6F2CE">
		<div id="Filtro">
			<div class="content-responsive" style="none repeat scroll 0 0; overflow:auto; color:#0000000; width:100%; height:60%; padding:4px;">
			    <table class="table table-responsive table-hover Filtrado" style="font-size:10px; margin-bottom: 0px; padding:0;" border="1">
					<tbody>
						<tr bgcolor="#b0e3ff">
							<td align="center" style="width: 5.5%;">Fecha</td>			<td align="center" style="width: 5.5%;">Comprobante</td>			<td align="center">CUIT</td>
							<td align="center">Proveedor</td>		<td align="center">Detalle</td>				<td align="center">Bruto</td>
							<td align="center">Iva</td>				<td align="center">Exento</td>				<td align="center">Imp<br>Interno</td>
							<td align="center">Percec<br>Iva</td>	<td align="center">Retenc<br>IB</td>		<td align="center">RetGan</td>
							<td align="center">Neto</td>			<td align="center">Pagado</td>				<td align="center">Cant<br>Litros</td>
							<td align="center">Partic<br>Iva</td>	<td align="center">Pasado<br>EnMes</td>		<td align="center">Area</td>
							<td align="center">Cuenta</td>
						</tr>
						<tr ng-repeat="c in Comprobantes " onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='';" style="" bgcolor="" ng-click="CargarDatosComprobante(c.IdComp)" data-toggle="modal" data-target="#myModalModificarComprobante">
							<td align="center" style="width: 5.5%;">{{c.Fecha | date : "dd-MM-y"}}</td>
							<td style="width:9%;" align="center">{{c.Comprobante}}</td>
							<td style="width:6.6%;" align="center">{{c.Cuit}}</td>
							<td width="100">{{c.Cliente}}</td>
							<td width="100">{{c.Detalle}}</td>
							<td width="25" align="right">{{c.Bruto}}</td>
							<td width="25" align="right">{{c.Iva |  currency:'' }}</td>
							<td width="25" align="right">{{c.Exento}}</td>
							<td width="15" align="right">{{c.ImpInterno}}</td>
							<td width="25" align="right">{{c.Percepcion}}</td>
							<td width="25" align="right">{{c.Retencion}}</td>
							<td width="25" align="right">{{c.Ganancia}}</td>
							<td width="25" align="right">{{c.Neto}}</td>
							<td style="color:#ff0000;" width="25" align="right">{{c.Pagado}}</td>
							<td width="15" align="right">{{c.Cantidad}}</td>
							<td width="15" align="center">{{c.Participa}}</td>
							<td width="25">{{c.Mes}}</td>
							<td width="65">{{c.Area}}</td>
							<td width="65">{{c.Cuenta}}</td>
						</tr>		       
						<tr bgcolor="#A4FF9C">
							<td colspan="5" align="right">Totales</td>
							<td align="right">{{TotalBruto}}</td>
							<td align="right">{{TotalIva}}</td>
							<td align="right">{{TotalExento}}</td>
							<td align="right">{{TotalImpInterno}}</td>
							<td align="right">{{TotalPercepcion}}</td>
							<td align="right">{{TotalRetencion}}</td>
							<td align="right">{{TotalGanancia}}</td>
							<td align="right">{{TotalNeto}}</td>
							<td style="color:#ff0000;" align="right">{{TotalPagado}}</td>
							<td align="right">{{TotalCantidad}}</td>
							<td align="right">Saldo</td>
							<td align="right">{{TotalSaldo}}</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<!--      B O T O N E R A
		 ----------------    -->


    <div id="Botonera" class="row col-md-12">
    	<div class="col-md-3 col-md-offset-4">
        	<input type="button" value="&lt;" id="Anterior" name="Anterior">
        	<input type="button" value="0" id="Pagina" name="Pagina">
        	<input type="button" value="&gt;" id="Posterior" name="Posterior"> 
		</div>
    	<div class="row col-md-3">
			<descripcion class="Titulo"><input class="Campo form-check-input" type="checkbox" name="FOrden"    checked="true"  id="FOrden"> Asc.</descripcion>
        	<descripcion class="Titulo"><input class="Campo form-check-input" type="checkbox" name="FConSaldo" checked="false" id="FConSaldo"> C/Saldo</descripcion>
    	</div>
    </div>


<!-- 	F O R M U L A R I O     M O D A L E S
		-------------------------------------    -->

    	<!-- Modal AgregarComprobante -->
	<div class="modal fade" id="myModalAgregarComprobante" role="dialog" align="center">
		<div class="modal-dialog">  
		<!-- Modal content-->
 			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar Comprobante - {{IdComp}}</h4>
				</div>
				<div class="modal-body">
					
			        <div class="row" style="background:#F2F2F2; padding-top:5px; padding-bottom:5px;">
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Fechas</descripcion>
							<input class="Campo form-control" type="date" style="min-width: 110%;" ng-model="MAFecha">
						</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cliente</descripcion>
			        		<!--<select class="form-control" ng-model="MACliente" ng-options="cmbMACliente.NombreCliente for cmbMACliente in Clientes.data"></select>-->
			        		<!--<input type="text" class="form-control" style="font-size:10px;" ng-model="MACliente">-->
			        		<select ng-model="MACliente" class="form-control">
			        			<option value="Todos">Todos</option>
			        			<option ng-repeat="X in Clientes.data" value="{{X.NombreCliente}}">{{X.NombreCliente}}</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Comprobante</descripcion>
			        		<input type="text" style="font-size:10px;min-width:122px;" class="form-control" ng-model="MAComprobante">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Detalle</descripcion>
			        		<input type="text" id="Detalle" name="Detalle" style="font-size:10px;" class="form-control" ng-model="MADetalle">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">A&nacute;o</descripcion>
			        		<select class="form-control Campo" style="font-size:10px;" ng-model="MAAnio">
			        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">PasadoEnMes</descripcion>
			        		<div id="DivPasadoEnMes">
			        			<select class="form-control" style="min-width : 110px;" ng-model="MAPasado">
			        				<option value=""></option><option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option></select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Area</descripcion>
			        		<div id="DivAreas">
			        			<!--<select class="form-control" ng-model="MAArea" ng-options="cmbMAArea.DescripcionAreas for cmbMAArea in Areas.data"></select>-->
			        			<!--<select class="form-control" ng-model="MAArea">
			        				<option></option>
			        			</select>-->
			        			<select class="form-control" ng-model="MAArea">
			        				<option ng-repeat="X in Areas.data" value="{{X.DescripcionAreas}}">{{X.DescripcionAreas}}</option>
			        			</select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cuenta</descripcion>
			            	<div id="DivCuentas">
			            		<!--<select class="form-control" ng-model="MACuenta" ng-options="cmbMACuenta.DescripcionCuentas for cmbMACuenta in Cuentas.data"></select>-->
			            		<!--<select class="form-control" ng-model="MACuenta">
			            			<option></option>
			            		</select>-->
			            		<select class="form-control" ng-model="MACuenta">
			        				<option ng-repeat="X in Cuentas.data" value="{{X.DescripcionCuentas}}">{{X.DescripcionCuentas}}</option>
			        			</select>
			            	</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Bruto</descripcion><br>
			        		<input type="text"  style="text-align:right;" name="MABruto" id="MABruto" ng-click="CalcularNeto();" ng-change="CalcularNeto();" class="form-control" ng-model="MABruto">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">ParticIva</descripcion><br>
			        		<div id="DivParticIva">
			        			<select class="form-control" ng-change="CalcularNeto()" ng-model="MAParticipa" style="text-align:right;">
			        				<option value="Si">Si</option><option value="No">No</option><option value="Ganancias">Ganancias</option><option value="IB">IB</option><option value="BsPersonal">BsPersonal</option>
			        			</select>
			        		</div> 
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Iva</descripcion><br>
			        		<select class="form-control" ng-change="CalcularNeto()" ng-model="MAIva" style="text-align:right;" ng-init="MAIva='21'">
			        			<option value="21" selected>21.00</option><option value="10.50" >10.50</option><option value="27.00" >27.00</option><option value="0.00" >0.00</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Exento</descripcion><br>
			        		<input type="text" style="text-align:right;" name="MAExento" id="MAExento" ng-change="CalcularNeto();" class="form-control" ng-model="MAExento" required>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Imp.Interno</descripcion><br>
			        		<input type="text" style="text-align:right;" id="MAImpInterno" ng-change="CalcularNeto();" class="form-control" ng-model="MAImpInterno">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Ret/Perc.Iva</descripcion>
			        		<input type="text" style="text-align:right;" id="MAPer" ng-change="CalcularNeto();" class="form-control" ng-model="MAPer" value="0">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Ret/Perc.IB</descripcion>
			        		<input type="text" style="text-align:right;" id="MARet" ng-change="CalcularNeto();" class="form-control" ng-model="MARet">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">RetGan</descripcion>  <!--  ui-mask="999999.99"  -->
			        		<input type="text" style="text-align:right;" id="MARetGan" class="form-control" style="text-align:right" ng-change="CalcularNeto()" ng-model="MARetGan">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Neto</descripcion><br>
			        		<input type="text" style="text-align:right;" id="MANeto" class="form-control" ng-model="MANeto" disabled>
			        	</div>	
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Pagado</descripcion><br>
			        		<input type="text" style="text-align:right;" id="MAPagado" class="form-control" ng-model="MAPagado" value="0">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">CantLitros</descripcion><br>
			        		<input type="text" style="text-align:right;" id="MACantidad" class="form-control" ng-model="MACantidad" value="0">
			        	</div><br>
			        	<button type="button" style="margin-top: 12px;" class="cols1 btn btn-success col-xs-4 col-xs-offset-1 col-md-3 col-md-offset-2" data-dismiss="modal" ng-click="AgregarComprobante()">Agregar</button>
			        	<button type="button" style="margin-top: 12px;" class="cols1 btn btn-info col-xs-4 col-xs-offset-1 col-md-3 col-md-offset-2" data-dismiss="modal">Cerrar</button>
			        	<!--<input type="text" ng-model="Brutos" numbers-only class="form-control" style="text-align:right;">
			        	<p><input type="text" ng-model="values" class="form-control" ng-pattern="/[0-9]{0,10}\.[0-9]{0,2}/" /></p>-->
			        </div>
    			</div>
			</div>
		</div>
		<!--<div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="AgregarComprobante()">Agregar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>-->
	</div>

		<!-- Modal ModificarComprobante -->
	<div class="modal fade" id="myModalModificarComprobante" role="dialog" align="center">
		<div class="modal-dialog">  
		<!-- Modal content-->
 			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" data-toggle="modal" data-target="#myModalAgregarComprobante" ng-click="CargarDatosComprobanteParaAlta();">Modificar Comprobante {{IdComp}} - {{MMCliente}}</h4>
				</div>
				<div class="modal-body">
					
			        <div class="row" style="background:#F2F2F2; padding-top:5px; padding-bottom:5px;">
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Fechas</descripcion>
							<input class="Campo form-control" type="date" style="min-width: 110%;" ng-model="MMFecha">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cliente</descripcion>
			        		<!--<select class="form-control" ng-model="MMCliente" ng-selected="MMClienteModel.NombreCliente==MMCliente" ng-options="cmbMMCliente.NombreCliente for cmbMMCliente in Clientes.data"></select>-->
			        		<!--<select ng-options="cmbMMCliente.NombreCliente for cmbMMCliente in Clientes.data" ng-model="MMCliente" class="form-control">
			        			<option value=""></option>
			        		</select>-->
			        		<select ng-model="MMCliente" class="form-control">
			        			<option value="Todos">Todos</option>
			        			<option ng-repeat="X in Clientes.data" value="{{X.NombreCliente}}">{{X.NombreCliente}}</option>
			        		</select>
			        		<!--<input type="text" ng-model="MMCliente">-->
			        		<!--<input type="text" class="form-control" style="font-size:10px;" ng-model="MMCliente">-->
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Comprobante</descripcion>
			        		<input type="text" style="font-size:10px;min-width:122px;" class="form-control" ng-model="MMComprobante">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Detalle</descripcion>
			        		<input type="text" style="font-size:10px;" class="form-control" ng-model="MMDetalle">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">A&nacute;o</descripcion>
			        		<select class="form-control Campo" ng-model="MMAnio" style="text-align:center;">
			        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">PasadoEnMes</descripcion>
			        		<div id="DivPasadoEnMes">
			        			<select class="form-control" style="min-width : 110px;" ng-model="MMPasado">
			        				<option value=" "> </option><option> </option><option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
			        			</select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Area</descripcion>
			        		<div id="DivAreas">
			        			<!--<select class="form-control" ng-model="MMArea" ng-options="cmbMMArea.DescripcionAreas for cmbMMArea in Areas.data"></select>-->
			        			<select class="form-control" ng-model="MMArea">
			        				<option ng-repeat="X in Areas.data" value="{{X.DescripcionAreas}}">{{X.DescripcionAreas}}</option>
			        			</select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cuenta</descripcion>
			            	<div id="DivCuentas">
			            		<!--<select class="form-control" ng-model="MMCuenta" ng-options="cmbMMCuenta.DescripcionCuentas for cmbMMCuenta in Cuentas.data"></select>-->
			            		<select class="form-control" ng-model="MMCuenta" >
			            			<option ng-repeat="X in Cuentas.data" value="{{X.DescripcionCuentas}}">{{X.DescripcionCuentas}}</option>
			            		</select>
			            	</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Bruto</descripcion><br>
			        		<input type="text" style="text-align:right;" size="8" class="form-control" ng-model="MMBruto" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">ParticIva</descripcion><br>
			        		<div id="DivParticIva">
			        			<select class="form-control" ng-model="MMParticipa" style="text-align:center;" ng-change="CalcularNetoModalModif();">
			        				<option value="Si">Si</option><option value="No">No</option><option value="Ganancias">Ganancias</option><option value="IB">IB</option><option value="BsPersonal">BsPersonal</option>
			        			</select>
			        		</div> 
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Iva</descripcion><br>
			        		<select class="form-control" ng-model="MMIva" style="text-align:right;" ng-change="CalcularNetoModalModif();">
			        			<option>21.00</option><option>10.50</option><option>27.00</option><option>0.00</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Exento</descripcion><br>
			        		<input type="text" style="text-align:right;" size="10" class="form-control" ng-model="MMExento" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Imp.Interno</descripcion><br>
			        		<input type="text" style="text-align:right;" size="10" class="form-control" ng-model="MMImpInterno" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Ret/Perc.Iva</descripcion>
			        		<input type="text" style="text-align:right;" size="5" class="form-control" ng-model="MMPer" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Ret/Perc.IB</descripcion>
			        		<input type="text" style="text-align:right;" size="5" class="form-control" ng-model="MMRet" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">RetGan</descripcion>
			        		<input type="text" style="text-align:right;" size="5" class="form-control" ng-model="MMRetGan" ng-change="CalcularNetoModalModif();">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Neto</descripcion><br>
			        		<input type="text" disabled style="text-align:right;" size="10" class="form-control" ng-model="MMNeto">
			        	</div>	
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Pagado</descripcion><br>
			        		<input type="text" style="text-align:right;" size="10" class="form-control" ng-model="MMPagado">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">CantLitros</descripcion><br>
			        		<input type="text" style="text-align:right;" size="10" class="form-control" ng-model="MMCantidad">
			        	</div>
						<div class="col-md-3">
							<br>
			        		<button type="button" class="cols1 btn btn-success col-xs-12 col-md-12" data-toggle="modal" data-target="#myModalGenerarRecibo" ng-click="CargarDatosComprobante(IdComp)">Generar Recibo</button>
			        	</div>
						<button type="button" style="margin-top: 12px;" class="cols1 btn btn-danger col-xs-3 col-xs-offset-1 col-md-2 col-md-offset-2" data-dismiss="modal" ng-click="EliminarComprobante()">Eliminar</button>
			        	<button type="button" style="margin-top: 12px;" class="cols1 btn btn-success col-xs-3 col-xs-offset-1 col-md-2 col-md-offset-2" data-dismiss="modal" ng-click="ModificarComprobante()">Modificar</button>
			        	<button type="button" style="margin-top: 12px;" class="cols1 btn btn-info col-xs-3 col-xs-offset-1 col-md-2 col-md-offset-1" data-dismiss="modal">Cerrar</button>
			        </div>
    			</div>
			</div>
		</div>
		<!--<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal" ng-click="ModificarComprobante()">Modificar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>-->
	</div>
	
	<!-- Generar Recibo -->
	<!-- -------------- -->
	<div class="modal fade" id="myModalGenerarRecibo" role="dialog" align="center">
		<div class="modal-dialog">  
		<!-- Modal content-->
 			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar Recibo de Pago {{IdComp}} - {{MMCliente}}</h4>
				</div>
				<div class="modal-body">
					
			        <div class="row" style="background:#F2F2F2; padding-top:5px; padding-bottom:5px;">
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Fechas</descripcion>
							<input class="Campo form-control" type="date" style="min-width: 110%;" ng-model="MARFecha">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cliente</descripcion>
			        		<select ng-model="MARCliente" class="form-control">
			        			<option value="Todos">Todos</option>
			        			<option ng-repeat="X in Clientes.data" value="{{X.NombreCliente}}">{{X.NombreCliente}}</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Comprobante</descripcion>
			        		<input type="text" style="font-size:10px;min-width:122px;" class="form-control" ng-model="MARComprobanteRecibo">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Detalle</descripcion>
			        		<input type="text" style="font-size:10px;" class="form-control" ng-model="MARDetalle">
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">A&nacute;o</descripcion>
			        		<select class="form-control Campo" ng-model="MARAnio" style="text-align:center;">
			        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
			        		</select>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">PasadoEnMes</descripcion>
			        		<div id="DivPasadoEnMes">
			        			<select class="form-control" style="min-width : 110px;" ng-model="MARPasado">
			        				<option value=" "> </option><option> </option><option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
			        			</select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Area</descripcion>
			        		<div id="DivAreas">
			        			<select class="form-control" ng-model="MARArea">
			        				<option ng-repeat="X in Areas.data" value="{{X.DescripcionAreas}}">{{X.DescripcionAreas}}</option>
			        			</select>
			        		</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Cuenta</descripcion>
			            	<div id="DivCuentas">
			            		<select class="form-control" ng-model="MARCuenta" >
			            			<option ng-repeat="X in Cuentas.data" value="{{X.DescripcionCuentas}}">{{X.DescripcionCuentas}}</option>
			            		</select>
			            	</div>
			        	</div>
			        	<div class="col-md-3">
			        		<descripcion class="Titulo">Pagado</descripcion><br>
			        		<input type="text" style="text-align:right;" size="10" class="form-control" ng-model="MontoRecibo">
			        	</div>
			        	<div ng-hide="true" id="exportthis">
                          Recibo Nro: {{IdComp}} <br>
                          Fecha: {{ MARFecha }} <br>
                          Recibí/mnos de {{X.NombreCliente}} <br>
                          La cantidad de $ / U$S (Valor en letras) <br>
                          en concepto de {{ MARDetalle }} <br>
                          Son $ / U$S: {{ MARPagado }} <br>
                          ---------------------
                          Firma y aclaración:
                          
                        </div>
                        <button class="cols1 btn btn-success col-xs-3 col-md-2" ng-click="Imprimir()" style="margin-top: 24px; margin-left:34px">Imprimir</button>
                        
                        <button type="button" style="margin-top: 24px;" class="cols1 btn btn-success col-xs-3 col-md-2 col-md-offset-1" data-dismiss="modal" ng-click="AgregarComprobanteRecibo()">Agregar</button>
                        <button type="button" style="margin-top: 24px;" class="cols1 btn btn-info col-xs-3 col-xs-offset-1 col-md-2 col-md-offset-1" data-dismiss="modal">Cerrar</button>
			        </div>
    			</div>
			</div>
		</div>
		<!--<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal" ng-click="ModificarComprobante()">Modificar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>-->
	</div>

	
	
			<!-- Modal Eliminar Comprobante -->
	<div class="modal fade" id="myModalEliminarComprobante" role="dialog" align="center">
		<div class="modal-dialog">  
		<!-- Modal content-->
 			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Eliminar Comprobante</h4>
				</div>
				<div class="modal-body">
					Seguro que quiere eliminar el comprobante, una vez eliminado no se podr&aacute; recuperar?
    			</div>
			</div>
			
			<button type="button" style="margin-top: 12px;" class="cols1 btn btn-info col-xs-4 col-xs-offset-1 col-md-3 col-md-offset-2" data-dismiss="modal">Cerrar</button>
		</div>
		<!--<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="EliminarComprobante()">Eliminar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>-->
	</div>
</div>



<div id="tab2" style="background:#F2F2F2;" class="tab-pane fade">
	
	<div class="row col-md-12">
    	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Mes</descripcion>
			<select class="form-control" ng-model="CCMes">
				<option value=""></option><option value="Enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
			</select>
    	</div>
    	<div class="col-md-3 col-xs-8">
        	<descripcion class="Titulo">Cliente</descripcion>
        	<div id="ClienteDeuda">
        		<input type="text" ng-model="search2" class="form-control" ng-change="LlamarFiltro2();">
        		<!--<select class="form-control" ng-model="CCCliente" ng-change="LlamarFiltro2();" ng-options="FPCliente2.NombreCliente for FPCliente2 in Clientes2.data">
        	</select>-->
			<!--	<select class="form-control" ng-model="CCCliente">
					<option></option>
				</select>	-->
        	</div>
    	</div>
      	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">ParticIva</descripcion>
        	<select class="form-control" ng-model="CCParticipa">
				<option value="Si">Si</option><option value="No">No</option><option value="Ganancias">Ganancias</option><option value="IB">IB</option><option value="BsPersonal">BsPersonal</option>
			</select>
    	</div>
     	<div class="col-md-3 col-xs-4">
        	<descripcion class="Titulo">Detalle</descripcion>
        	<div id="Detalle">
        		<select class="form-control" ng-model="CCDetalle">
					<option></option>
				</select>	
        	</div>
    	</div>
     	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Area</descripcion>
        	<div id=DivFAreas2>
        		<select class="form-control" ng-model="CCArea" ng-click="Filtro(CCArea.IdArea);" ng-options="cmbCCArea.DescripcionAreas for cmbCCArea in Areas.data"></select>
        		<!--<select class="form-control" ng-model="CCArea">
					<option></option>
				</select>	-->
        	</div>
    	</div>
     	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Cuenta</descripcion>
        	<div id=DivFCuentas2>
        		<select class="form-control" ng-model="CCCuenta" ng-click="Filtro(CCCuenta.IdCuentas);" ng-options="cmbCCCuenta.DescripcionCuentas for cmbCCCuenta in Cuentas.data"></select>
        		<!--<select class="form-control" ng-model="CCCuenta">
					<option></option>
				</select>	-->
        	</div>
    	</div>
       	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Desde</descripcion>
        	<input class="Campo form-control" type="date"  ng-model="CCFDesde" size="10">
    	</div>
       	<div class="col-md-2 col-xs-4">
        	<descripcion class="Titulo">Hasta</descripcion>
        	<input class="Campo form-control" type="date" ng-model="CCFHasta"  size="10">
    	</div>
       	<div class="col-md-1 col-xs-4">
        	<descripcion class="Titulo">IVA</descripcion>
        	<SELECT class="Campo form-control" ng-model="CCIva"><OPTION>Si</OPTION><OPTION>No</OPTION></SELECT>
    	</div>
       	<div class="col-md-1 col-xs-4">
        	<descripcion class="Titulo">A&ntilde;o</descripcion>
    		<select class="form-control Campo" style="font-size:10px;min-width: 110%;" ng-model="CCAnio">
    			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
    		</select>
    	</div>
       	<div class="col-md-1 col-xs-4">
        	<descripcion class="Titulo">ASC/DESC</descripcion>
        	<input class="Campo form-control" type="checkbox" checked="true" ng-cheked ng-model="CCAsc">
    	</div>
       	<div class="col-md-3">
       		<!--<descripcion class="Titulo"></descripcion>
       		<button type="button" class="cols1 btn btn-success col-xs-4 col-xs-offset-1 col-md-3 col-md-offset-1" data-toggle="modal" data-target="#myModalAgregarComprobante">Agregar</button>
       		<button type="button" class="btn btn-success col-md-4">Cargar Datos</button>-->
			<descripcion class="Titulo"></descripcion>
			<input class="Campo form-control btn btn-success" style="text-align: center;" ng-click="showWait(); LlamarFiltro2();" type="submit" value="Cargar Datos">
    	</div>
		<div class="content" style="none repeat scroll 0 0;overflow:auto;color:#ffffff;width:98%;height:60%;	:4px;">
			
<div class="row col-md-12" style="background-color:#E6F2CE">
		<div id="Filtro">
			<div class="content-responsive" style="none repeat scroll 0 0; overflow:auto; color:#110e0e; width:100%; height:60%; padding:4px;">
			    <table class="table table-responsive table-hover" style="font-size:10px; margin-bottom: 0px;" border="1">
					<tbody>
						<tr bgcolor="#b0e3ff">
							<td align="center">Fecha</td>			<td align="center">Comprobante</td>			<td align="center">CUIT</td>
							<td align="center">Proveedor</td>		<td align="center">Detalle</td>				<td align="center">Bruto</td>
							<td align="center">Iva</td>				<td align="center">Exento</td>				<td align="center">Imp<br>Interno</td>
							<td align="center">Percec<br>Iva</td>	<td align="center">Retenc<br>IB</td>		<td align="center">RetGan</td>
							<td align="center">Neto</td>			<td align="center">Pagado</td>				<td align="center">Cant<br>Litros</td>
							<td align="center">Partic<br>Iva</td>	<td align="center">Pasado<br>EnMes</td>		<td align="center">Area</td>
							<td align="center">Cuenta</td>
						</tr>
						<tr ng-repeat="c2 in Comprobantes2" onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='';" style="" bgcolor="">
							<td width="60">{{c2.Fecha | date : "dd-MM-y"}}</td>
							<td width="70" align="right">{{c2.Comprobante}}</td>
							<<td width="75">{{c2.Cuit}}</td>
							<td width="100">{{c2.Cliente}}</td>
							<td width="100">{{c2.Detalle}}</td>
							<td width="25" align="right">{{c2.Bruto}}</td>
							<td width="25" align="right">{{c2.Iva}}</td>
							<td width="25" align="right">{{c2.Exento}}</td>
							<td width="15" align="right">{{c2.ImpInterno}}</td>
							<td width="25" align="right">{{c2.Percepcion}}</td>
							<td width="25" align="right">{{c2.Retencion}}</td>
							<td width="25" align="right">{{c2.Ganancia}}</td>
							<td width="25" align="right">{{c2.Neto}}</td>
							<td style="color:#ff0000;" width="25" align="right">{{c2.Pagado}}</td>
							<td width="15" align="right">{{c2.Cantidad}}</td>
							<td width="15" align="center">{{c2.Participa}}</td>
							<td width="25">{{c2.Mes}}</td>
							<td width="65">{{c2.Area}}</td>
							<td width="65">{{c2.Cuenta}}</td>
						</tr>		       
						<tr bgcolor="#A4FF9C">
							<td colspan="5" align="right">Totales</td>
							<td align="right">{{TotalBruto2}}</td>
							<td align="right">{{TotalIva2}}</td>
							<td align="right">{{TotalExento2}}</td>
							<td align="right">{{TotalImpInterno2}}</td>
							<td align="right">{{TotalPercepcion2}}</td>
							<td align="right">{{TotalRetencion2}}</td>
							<td align="right">{{TotalGanancia2}}</td>
							<td align="right">{{TotalNeto2}}</td>
							<td style="color:#ff0000;" align="right">{{TotalPagado2}}</td>
							<td align="right">{{TotalCantidad2}}</td>
							<td align="right">Saldo</td>
							<td align="right">{{TotalSaldo2}}</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


			<div id="Filtro2">
			</div>
		</div>
	</div>
</div>

<div id="tab3" class="tab-pane fade">
	<!--<div ng-show="MostrarEspera" class="modal fade" id="Espera" role="dialog" align="center">
		<div class="modal-dialog">  
 			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Eliminar Comprobante</h4>
				</div>
				<div class="modal-body">
					<img src="Espera.gif" width="200px;" height="200px;" style="border-radius: 20px;">
    			</div>
			</div>
			
			<button type="button" style="margin-top: 12px;" class="cols1 btn btn-info col-xs-4 col-xs-offset-1 col-md-3 col-md-offset-2" data-dismiss="modal">Cerrar</button>
		</div>
	</div>-->
	

		<div class="row col-md-12"><br>
			<!-- <div ng-show="MostrarEspera" style="z-index:100; position:fixed !important; bottom: 35% !important; right: 40% !important;">
				<img src="images/Espera.gif" width="200px;" height="200px;" style="border-radius: 20px;">
			</div>-->
			<div class="col-md-2 col-md-offset-4 col-xs-6">
            	<descripcion class="Titulo">Desde</descripcion>
				<input class="Campo form-control" type="date" ng-model="PDesde">
        	</div>
			<div class="col-md-2 col-xs-6">
            	<descripcion class="Titulo">Hasta</descripcion>
				<input class="Campo form-control" type="date" ng-model="PHasta">
        	</div>
        </div>
        <div class="row col-md-12"><br>
	    	<div class="col-md-2 col-md-offset-4 col-xs-6">
	    		<descripcion class="Titulo">A&nacute;o</descripcion>
        		<select class="form-control Campo" style="font-size:10px;" ng-model="PAnio">
        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
        		</select>
			</div>
			<div class="col-md-2 col-xs-6">
				<descripcion class="Titulo">Unidad de Negocio</descripcion>
				<div id="DivCmbDeuda">
					<!--<select class="form-control" ng-model="PUnidad" ng-click="Filtro(PUnidad.IdArea);" ng-options="cmbUnidad.DescripcionAreas for cmbUnidad in Areas.data"></select>-->
				<!--<select class="form-control" ng-model="PUnidad">
					<option></option>
				</select>	-->
				<select class="form-control" ng-model="PUnidad" ng-options="cmbPUnidad.DescripcionAreas for cmbPUnidad in Areas.data">
					<option ng-value="Todos">Todos</option>
				</select>
				</div>
			</div>
		</div>
        <div class="row col-md-12"><br>
	    	<div class="col-md-2 col-md-offset-4">
    			<input class="Campo form-control btn btn-success" type="button" style="text-align: center;" value="Solicitar Deuda" ng-click="showWait();">
        	</div>
			<div class="col-md-2">
    			<input class="Campo form-control btn btn-info" type="button"  style="text-align: center;" value="Generar PDF">
	    	</div>
		</div>
		<div class="row col-md-6 col-md-offset-3"><br>
			<table class="table table-responsive table-hover col-md-3 col-xs-12" border="1">
		    	<th style="text-align:center">Raz&oacute;n Social</th><th style="text-align:center">Deuda</th>
		    	<!--ng-options="FPCliente.NombreCliente for FPCliente in Clientes.data"-->
		    	<tr ng-repeat="x in DeudasClientes">
		    		<td style="padding-left: 50px;padding-top: 2px;padding-bottom: 2px;">{{x.NombreCliente}}</td>
		    		<td style="text-align: right;padding-top: 2px;padding-bottom: 2px;padding-right: 25px;">{{x.Deuda | currency : '$ '}}</td>
		    	</tr>
		    	<tr><td><b>TOTAL<b></td><td align="right" style="padding-right: 25px;"><b>{{TotalDeuda | currency : '$ '}}</b></td></tr>
		    </table>

			<!--<div id="DeudaProveedores">
			</div>-->

		</div>
	</div>
	
    <div id="tab4" class="tab-pane fade">
		<div class="row col-md-12"><br>
	    	<div class="col-md-2 col-md-offset-4 col-xs-6">
	    		<descripcion class="Titulo">Desde</descripcion>
	    		<input class="Campo form-control" type="date" ng-model="CRDesde">
	    	</div>
	    	<div class="col-md-2 col-xs-6">
	    		<descripcion class="Titulo">Hasta</descripcion>
    			<input class="Campo form-control" type="date" ng-model="CRHasta">		
			</div>
		</div>
		<div class="row col-md-12"><br>
	    	<div class="col-md-2 col-md-offset-4 col-xs-6">
	    		<descripcion class="Titulo">A&nacute;os</descripcion>
        		<select class="form-control Campo" style="font-size:10px;" ng-model="CRAnio">
        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
        		</select>
    		</div>
			<div class="col-md-2 col-xs-6">
	    		<descripcion class="Titulo">Unidad de Negocio</descripcion>
		    	<div id="DivCmbCredito">
		    		<select class="form-control" ng-model="CRUnidad" ng-click="Filtro(CRUnidad.IdArea);" ng-options="cmbCRUnidad.DescripcionAreas for cmbCRUnidad in Areas.data"></select>
		   			<!--<select class="form-control" ng-model="CRUnidad">
						<option></option>
					</select>	-->
		    	</div>
    		</div>
	    </div>
		<div class="row col-md-12"><br>
	    	<div class="col-md-2 col-md-offset-4">
				<input class="Campo form-control btn btn-success" style="text-align: center;" type="submit" value="Solicitar Credito">
			</div>
			<div class="col-md-2">
				<input class="Campo form-control btn btn-info" style="text-align: center;" type="button" value="Generar PDF">
	    	</div>
		</div>
		<div class="row col-md-12"><br>
			<div id="CreditoProveedores">
				
			</div>
		</div>
	</div>
	
	<div id="tab5" class="tab-pane fade">
		<div class="row col-md-12"><br>	
    		<div class="col-md-2 col-md-offset-4 col-xs-6">
    			<descripcion class="Titulo">Incluir Areas</descripcion>
    			<input class="Campo form-control" type="checkbox" checked="true" ng-model="ASAreas">
    		</div> 
    		<div class="col-md-2 col-xs-6">
				<descripcion class="Titulo">A&ntilde;o</descripcion>
        		<select class="form-control Campo" style="font-size:10px;" ng-model="ASAnio">
        			<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
        		</select>
				<br>
			</div>
		</div>
		<div class="row col-md-12">
			<div class="col-md-4 col-md-offset-4">
				<input class="Campo form-control btn btn-success" style="text-align: center;" type="button" value="Solicitar Deuda por Area"><br>
			</div>
		</div>
		<div class="row col-md-12"><br>
			<div id="DeudaPorAreas"></div>
		</div>
	</div>

	<div id="tab6" class="tab-pane fade">
		<div class="row col-md-12"><br>
            <div class="col-md-2 col-md-offset-4 col-xs-6">
            	<descripcion class="Titulo">Mes</descripcion><br>
            	<select class="form-control" ng-model="LMes">
					<option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
				</select>
            </div>
            <div class="col-md-2 col-xs-6">
        		<descripcion class="Titulo">A&ntilde;o</descripcion>
        		<select class="form-control Campo" style="font-size:10px;" ng-model="LAnio">
			    	<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
			    </select>
        	</div>
		</div>
		<div class="row col-md-12">
			<div class="col-md-4 col-md-offset-4"><br>
        		<input class="Campo form-control btn btn-success" type="button" style="text-align: center;" value= "Generar Libro de Iva Ventas">
			</div>
		</div>
	</div>

	<div id="tab7" class="tab-pane fade">
		<div class="row col-md-12" ng-init="DibujarLibrosCerrados(CLAnio);">
            <div class="col-md-2 col-md-offset-4 col-xs-6">
            	<descripcion class="Titulo">Mes</descripcion><br>
            	<select class="form-control" ng-model="CLMes">
					<option value="enero">enero</option><option value="febrero">febrero</option><option value="marzo">marzo</option><option value="abril">abril</option><option value="mayo">mayo</option><option value="junio">junio</option><option value="julio">julio</option><option value="agosto">agosto</option><option value="setiembre">setiembre</option><option value="octubre">octubre</option><option value="noviembre">noviembre</option><option value="diciembre">diciembre</option>
				</select>
            </div>
            <div class="col-md-2 col-xs-6">
            	<descripcion class="Titulo">A&ntilde;o</descripcion>
				<select class="form-control Campo" style="font-size:10px;" ng-model="CLAnio" ng-change="DibujarLibrosCerrados(CLAnio);">
			    	<option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
			    </select>
            </div>
		</div>
		<div class="row col-md-6 col-md-offset-3"><br>
		    <table class="table table-responsive table-hover col-md-3 col-xs-12" border="1">
		    	<th style="text-align:center">Mes</th><th style="text-align:center">Estado</th>
		    	<!--ng-options="FPCliente.NombreCliente for FPCliente in Clientes.data"-->
		    	<tr ng-repeat="x in LibrosCerrados">
		    		<td style="padding-left: 50px;padding-top: 2px;padding-bottom: 2px;">{{x.MesLibroCerrado}}</td>
		    		<td style="text-align: center;padding-top: 2px;padding-bottom: 2px;">{{x.EstadoLibroCerrado==0 ? 'Abierto':'Cerrado'}}</td>
		    	</tr>
		    </table>
		</div><br>
		<div class="row col-md-12">
			<div class="col-md-4 col-md-offset-4"><br>
        		<input data-toggle="modal" data-target="#myModalCerrarLibro" class="Campo form-control btn btn-warning" type="button" style="text-align: center;" value= "Cerrar Libro">
			</div>
		</div>
		

		<div class="modal fade" id="myModalCerrarLibro" role="dialog" align="center">
			<div class="modal-dialog">  
			<!-- Modal content-->
	 			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cerrar Libro</h4>
					</div>
					<div class="modal-body">
						Seguro que quiere cerrar el libro de {{CLMes}} / {{CLAnio}}, una vez cerrado no se podr&aacute; recuperar?
	    			</div>
				</div>		
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="CerrarLibro()">Cerrar Libro</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>		
  	</div>

	</div>
</div>
</div>    
<?php include_once('../footer.php'); ?>  
</body>