<html ng-app="datosApp">

<head>
	<script type="text/javascript" src="bootstrap/angular.min.js"></script>
	<meta charset="utf-8">

	<title>Elecad</title>

	<script type="text/javascript" src="principalController.js"> </script>

	<meta http-equiv=amp;quot;X-UA-Compatibleamp;quot; content=amp;quot;IE=edgeamp;quot;>
	<meta name=amp;quot;viewportamp;quot; content=amp;quot;width=device-width, initial-scale=1amp;quot;>
	<meta name="viewport" content="width=device-width, initial - scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- FORMULARIO MODAL -->
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body style="background-color:black;" ng-controller="principalController" ng-init="init();">
	<div class="container">
		<div style="display: flex">
			<div class="column" style="width:24%; padding-right: 5px;">
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('1');">
					<strong>1 </strong>Diseños
				</div>
				<div class="notice notice-danger menu align-self-center text-center" ng-click="getOTsByState('2');">
					<strong>2</strong> Impresiones Laser
				</div>
				<div class="notice notice-info menu align-self-center text-center" ng-click="getOTsByState('3');">
					<strong>3</strong> Enviados a Imprimir
				</div>
				<div class="notice notice-warning menu align-self-center text-center" ng-click="getOTsByState('4');">
					<strong>4</strong> Imprimiendo
				</div>
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('5');">
					<strong>5</strong> Trabajo Impreso
				</div>
				</a>
				<div class="notice notice-danger menu align-self-center text-center" ng-click="getOTsByState('6');">
					<strong>6</strong> Terminaciones
				</div>
				<div class="notice notice-info menu align-self-center text-center" ng-click="getOTsByState('7');">
					<strong>7</strong> Listo para entregar
				</div>
				<div class="notice notice-warning menu align-self-center text-center" ng-click="getOTsByState('8');">
					<strong>8</strong> Trabajos Retirados
				</div>
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('9');">
					<strong>9</strong> Trabajos a enviar
				</div>
				<a href="#" class="float" ng-click="getClients();" data-toggle="modal" data-target="#modalOT">
					<i class="fa fa-plus my-float"></i>
				</a>
			</div>
			<div style="width: 70%;">
				<div ng-repeat="ot in ots" ng-model="OTrow" ng-click="CargaOT(ot[0]);" style="display:block; margin: 1px 5px 5px 5px; padding:1px; width:100%;height:23%; background-color: red; background-image: linear-gradient( to right, red, #f06d06, rgb(255, 255, 0), green ); opacity: 0.9; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="gradient" data-toggle="modal" data-target="#modalOTmodify">
					<div class="card-list">
						<div class="row" style="align-items:center; justify-content: space-around;display:flex;">
							<img src="../newelecad2/assets/sinfoto.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
							<div>
								<img ng-show="ot.OT_file" style="border-radius: 5%;" src="assets/images/{{ot.OT_file}}" width="60px;" height="60px;">
								<img ng-hide="ot.OT_file" style="border-radius: 5%;" src="assets/sinfoto.png" width="60px;" height="60px;">
							</div>
							<div style="font-size:18px;">{{ ot.client_name }} - {{ ot.client_telephone }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!--  AGREGAR OT
      ----------------- -->
		<div class="modal fade" id="modalOT" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="width: 100%;">
					<div class="modal-header" style="display: flex;align-items: center;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Agregar Orden de Trabajo</h4>
					</div>
					<div class="modal-body">
						<label for="Fecha">Fecha</label>
						<input type="date" class="form-control col-5" ng-model="OT_date" id="OT_date">
						<label for="Cliente" style="padding-top: 10px;">Cliente</label>
						<div class="row" style="display: flex;align-items: center;padding-left: 15px;padding-right: 15px;">
							<select ng-model="OT_client" ng-value="OT_client" class="form-control col-8" style="height:34px;">
								<option selected value=""></option>
								<option ng-repeat="client in Clients" value="{{ client.id }}">{{ client.client_name }}</option>
							</select>
							<button class="col-4" type="button" style="background-color:yellow; border-radius:5px;">
								<spam class="fa fa-arrow-right" style="font-size:20px;color:lightblue;text-shadow:2px 2px 4px #000000;"></spam>
								Agregar Cliente
							</button>
						</div>
						<label for="DetalledeTrabajo" style="padding-top: 10px;">Detalle de Trabajo</label>
						<textarea ng-model="OT_detail" ng-value="OT_detail" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertOT(1);" style="font-size: 0.8em;">Agregar</button>
						<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
					</div>
				</div>
			</div>
		</div> <!-- //Add OT -->

		<!--  MODIFY OT
      ----------------- -->
		<div class="modal fade" id="modalOTmodify" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="width: max-content;height: max-content;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Modificar Orden de Trabajo</h3>
					</div>
					<div class="modal-body">
						<div style="display:flex;" class="col-12">
							<div class="col-2">
								<label>Fecha</label>
								<input type="text" class="form-control" ng-model="OT_date_modify" value="{{ otModify.OT_date }}" disabled style="width: 100px;">
							</div>
							<div class="col-5">
								<label for="Cliente">Cliente</label>
								<input type="text" class="form-control raised-block" ng-model="OT_client_modify" value="{{ otModify.client_name }}" style="margin-left: 7px;" disabled>
							</div>
							<div ng-hide="OT_file" class="col-5">
								<form action="upload_image.php" method="POST" enctype="multipart/form-data">
										<input type="hidden" id="OT" name="OT" value="{{OT_id}}">
									<div class="row col-12" style="align-content: end; height: 100%;">
										<input class="form-control col-8" type="file" name="fileToUpload" id="fileToUpload" ng-model="fileToUpload">
										<input class="form-control col-4" type="submit" value="Cargar" ng-click="UpdateFotoLoc(OT_id)">
										{{fileToUpload}}
										<!--<div class="form-group" style="padding-left: 15px;">
										<label for="myFileField">Select a file: </label><br>
										<button ng-click="uploadFile()" class="btn btn-primary">Upload File</button>
									</div>-->
									</div>
								</form>
							</div>
							<div ng-show="OT_file" class="col-5">
								<img src="assets/images/{{OT_file}}" width="100px" alt="">
							</div>
						</div>
						<div class="col-12">
							<label for="DetalledeTrabajo" style="padding-top: 10px;">Detalle de Trabajo</label>
							<textarea ng-model="OT_detail_modify" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
						</div><br>
						<div class="col-12" style="display: block; width:max-content;">
							<label>Elementos a utilizar</label>
							<table class="form-control table-bordered" style="display:contents; border: 1px solid black;width:97%; margin:10px;padding:5px;">
								<tbody>
									<tr style="text-align: center;">
										<td>Elemento</td>
										<td>Cantidad</td>
										<td>Ancho</td>
										<td>Alto</td>
										<td>Precio M2</td>
										<td>M2</td>
										<td>Total</td>
										<td></td>
									</tr>
									<tr ng-repeat="Ot_modify in Ot_modifys" style="text-align: center;">
										<td>{{ Ot_modify.product_description }}</td>
										<td>{{ Ot_modify.Rel_quantity }}</td>
										<td>{{ Ot_modify.Rel_width }}</td>
										<td>{{ Ot_modify.Rel_height }}</td>
										<td>{{ Ot_modify.Rel_price }}</td>
										<td>{{ Ot_modify.Rel_height * Ot_modify.Rel_width * Ot_modify.Rel_quantity | number }}</td>
										<td style="text-align: right; margin-right: 10px; padding-right: 10px;">{{ Ot_modify.Total | number }}</td>
										<td><i class="fa fa-remove btn btn-danger" ng-click="CargarIdRelacion(Ot_modify.id);" data-toggle="modal" data-target="#myModalDeleteProduct"></i></td>
									</tr>
									<tr style="vertical-align: top;">
										<td><select class="form-control" style="width:175px;height: 34px" ng-model="selectproduct" ng-change="CargarDatosProducto(selectproduct);">
												<option value="" selected></option>
												<option ng-repeat="product in Products" value="{{ product.id }}">{{ product.product_description }}</option>
											</select>
										</td>
										<td><input class="form-control txtbox" type="text" placeholder="Cantidad" ng-model="Detail_quantity" ng-value="Detail_quantity" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="Ancho" ng-model="Detail_width" ng-value="Detail_width" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="Alto" ng-model="Detail_height" ng-value="Detail_height" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="PrecioM2" ng-model="product_price" ng-value="product_price" style="width:100px" ng-change="CalcularTotal();" disabled></td>
										<td><input class="form-control txtbox" type="text" ng-model="m2" placeholder="{{ Detail_quantity* Detail_height * Detail_width | number }}" disabled style="width:100px"></td>
										<td><input class="form-control txtbox" type="text" placeholder="{{ Detail_quantity* Detail_height * Detail_width * product_price| number }}" ng-model="Detail_total" style="width:100px;" disabled></td>
										<td><i class="fa fa-arrow-right btn btn-success" ng-click="InsertRelacion(ot.id);GetProducts();"></i></td>


									</tr>
									<tr>
										<?php $total = 0; ?>
									</tr>
									<tr>
										<td colspan=6></td>
										<td>Total $ {{ total }}</td>
										<td></td>
									</tr>
									</tr>
								</tbody>
							</table>
							<select ng-model="PasarEstado">
								<option value="1">Diseños</option>
								<option value="2">Impresiones Laser</option>
								<option value="3">Enviados a Imprimir </option>
								<option value="4">Imprimiendo</option>
								<option value="5">Trabajo Impreso</option>
								<option value="6">Terminaciones</option>
								<option value="7">Listo para entregar</option>
								<option value="8">Trabajos Retirados</option>
								<option value="9">Trabajos a enviar</option>
							</select>
							<input type="button" value="Actualizar estado" ng-click="PasarSiguienteEstado(OT_id,PasarEstado);" style="margin-top: 10px;" data-toggle="modal" data-target="#modalCambioEstado">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="UpdateOT(OT_id,fichero_usuario);" style="font-size: 0.8em;">Agregar</button>
						<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
					</div>

				</div>
			</div>
		</div> <!-- //Modify OT -->

		<!--  DELETE PRODUCT 
      ------------------->
		<div class="modal fade" id="myModalDeleteProduct" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="width: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Eliminar producto</h3>
					</div>
					<div class="modal-body">
						<h4>{{ModalUbicDesc}}</h4>
						<div style="display: block;;width:100%">
							<div class="Card-Add">
								<div class="card-body">
									<h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">ELIMINAR PRODUCTOS</h5>
									<p class="card-text">
										Seguro que quiere eliminar el producto {{Ot_modify.product_description}} {{ product_description }}?
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="DeleteRelac(IdRelacion);GetProducts();" style="font-size: 0.8em;">Eliminar</button>
						<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
					</div>
				</div>
			</div>
		</div> <!-- //Delete product -->

		<!--  Modificar estado 
		----------------- -->
		<div class="modal fade" id="modalCambioEstado" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="width: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Estado Cambiado</h3>
					</div>
					<div class="modal-body">
						<div style="display: block;;width:100%">
							<div class="Card-Add">
								<div class="card-body">
									<h5 class="card-title title-card" ng-show="ModalModificar=='Agregar'">ESTADO CAMBIADO</h5>
									<p class="card-text">
										El estado de la Orden de trabajo se ha modificado.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
			</div>
		</div> <!-- //Modificar estado -->
	</div>

	</div>

	<div class="container">
		<div class="row" style="display: flex;">
			<a href="recursos/OT">
				<div class="card">
					<div>
						<img src="assets/kate-trysh-Dnkr_lmdKi8-unsplash.jpg" alt="" style="width:100%; height:100px">
					</div>
					<h5 class="card-title">Ordenes de Trabajo</h5>
					<div class="card-body"></div>
				</div>
			</a>
			<a href="recursos/clients">
				<div class="card">
					<div>
						<img src="assets/clients.jpg" alt="" style="width:100%; height:100px">
					</div>
					<h5 class="card-title">Clientes</h5>
					<div class="card-body"></div>
				</div>
			</a>
			<a href="recursos/products">
				<div class="card">
					<div>
						<img src="assets/products.jpg" alt="" style="width:100%; height:100px">
					</div>
					<h5 class="card-title">Productos</h5>
					<div class="card-body"></div>
				</div>
			</a>
			<a href="recursos/forms">
				<div class="card">
					<div>
						<img src="assets/pays.jpg" alt="" style="width:100%; height:100px">
					</div>
					<h5 class="card-title">Formas de Pago</h5>
					<div class="card-body"></div>
				</div>
			</a>
			<a href="recursos/lists">
				<div class="card">
					<div>
						<img src="assets/pricelist.jpg" alt="" style="width:100%; height:100px">
					</div>
					<h5 class="card-title">Listas de Precio</h5>
					<div class="card-body"></div>
				</div>
			</a>
		</div>
	</div>
</body>

</html>