<html ng-app="datosApp">

<head>
	<script type="text/javascript" src="bootstrap/angular.min.js"></script>
	<meta charset="utf-8">

	<title>Elecad</title>

	<script type="text/javascript" src="principalController.js"> </script>

	<meta http-equiv=amp;quot;X-UA-Compatibleamp;quot; content=amp;quot;IE=edgeamp;quot;>
	<meta name=amp;quot;viewportamp;quot; content=amp;quot;width=device-width, initial-scale=1amp;quot;>
	<meta name="viewport" content="width=device-width, initial - scale=1.0">

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
				<!--<a href="recursos/OT/ListarOT.php?state=1" class="menu">-->
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('1');">
					<strong>1 </strong>Diseños
				</div>
				<!--</a>-->
				<!--<a href="#" class="menu align-self-center text-center">-->
				<div class="notice notice-danger menu align-self-center text-center" ng-click="getOTsByState('2');">
					<strong>2</strong> Impresiones Laser
				</div>
				<!-- </a>
				<a href="recursos/OT/ListarOT.php?state=3" class="menu align-self-center text-center">-->
				<div class="notice notice-info menu align-self-center text-center" ng-click="getOTsByState('3');">
					<strong>3</strong> Enviados a Imprimir
				</div>
				<!--</a>-->
				<!--<a href="recursos/ListarOT/4" class="menu align-self-center text-center">-->
				<div class="notice notice-warning menu align-self-center text-center" ng-click="getOTsByState('4');">
					<strong>4</strong> Imprimiendo
				</div>
				<!--</a>-->
				<!--<a href="recursos/ListarOT/5" class="menu align-self-center text-center">-->
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('5');">
					<strong>5</strong> Trabajo Impreso
				</div>
				</a>
				<!--<a href="recursos/home/6" class="menu align-self-center text-center">-->
				<div class="notice notice-danger menu align-self-center text-center" ng-click="getOTsByState('6');">
					<strong>6</strong> Terminaciones
				</div>
				<!--</a>-->
				<!--<a href="recursos/home/7" class="menu align-self-center text-center">-->
				<div class="notice notice-info menu align-self-center text-center" ng-click="getOTsByState('7');">
					<strong>7</strong> Listo para entregar
				</div>
				<!--</a>
				<a href="recursos/home/8" class="menu align-self-center text-center">-->
				<div class="notice notice-warning menu" ng-click="getOTsByState('8');">
					<strong>8</strong> Trabajos Retirados
				</div>
				<!--</a>
				<a href="recursos/home/9">-->
				<div class="notice notice-success menu align-self-center text-center" ng-click="getOTsByState('9');">
					<strong>9</strong> Trabajos a enviar
				</div>
				<!--</a>-->
				<a href="#" class="float" data-toggle="modal" data-target="#modalOT">
					<i class="fa fa-plus my-float"></i>
				</a>
			</div>

			<div style="width: 70%;">
				<div ng-repeat="ot in ots" ng-model="OTrow" ng-click="CargaOT(ot.id);" style="display:block; margin: 1px 5px 5px 5px; padding:1px; width:100%;height:23%; background-color: red; background-image: linear-gradient( to right, red, #f06d06, rgb(255, 255, 0), green ); opacity: 0.9; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="gradient" data-toggle="modal" data-target="#modalOTmodify">
					<!--<a href="recursos/OT/modify.php&id={{ ot.id }}" style="text-decoration: none;">-->
					<div class="card-list">
						<div class="row" style="align-items:center; justify-content: space-around;display:flex;">
							<img src="../newelecad2/assets/sinfoto.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
							<div>
								<img style="border-radius: 5%;" src="../newelecad2/assets/sinfoto.png" width="60px;" height="60px;">
								<!--<img style="border-radius: 5%;" src="../newelecad2/images/{{ ot.OT_file }}" width="60px;" height="60px;">-->
							</div>
							<div style="font-size:18px;">{{ ot.client_name }} - {{ ot.client_telephone }}</div>
						</div>
					</div>
					<!--</a>-->
				</div>
			</div>
		</div>



		<!--  AGREGAR OT
              ----------------- -->
		<div class="modal fade" id="modalOT" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="width: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Agregar Orden de Trabajo</h3>
					</div>
					<div class="modal-body">

						<label for="Fecha">Fecha</label>
						<input type="date" class="form-control col-5" id="OT_date">

						<div class="row">
							<label for="Cliente">Cliente</label>
							<select ng-model="OT_client" ng-value="OT_client" class="form-control col-5">
								<option selected value=""></option>
								<option ng-repeat="client in Clients" value="{{ client.id }}">{{ client.client_name }}</option>
							</select>
							<a href="recursos/clients" class="col-5">
								<button type="button" class="btn btn-default btn-lg" style="background-color:yellow;margin-top: 19px;">
									<spam class="fa fa-arrow-right" style="font-size:20px;color:lightblue;text-shadow:2px 2px 4px #000000;"></spam>
									Agregar Cliente
								</button>
							</a>
						</div>
						<br>
						<label for="DetalledeTrabajo">Detalle de Trabajo</label>
						<textarea ng-model="OT_detail" ng-value="OT_detail" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertClient(1);" style="font-size: 0.8em;">Agregar</button>
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
				<div class="modal-content" style="width: max-content;height: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Modificar Orden de Trabajo</h3>
					</div>
					<div class="modal-body">
						<div style="display:flex;justify-content: space-around;">
							<div>
								<label>Fecha</label>
								<input type="date" class="form-control col-5" ng-model="OT_date_modify" value="{{ otModify.OT_date }}">
							</div>
							<div>
								<label for="Cliente">Cliente</label>
								<input type="text" class="form-control col-5" ng-model="OT_client_modify" value="{{ otModify.client_name }}">

								<!--<select ng-model="OT_client" ng-value="OT_client" class="form-control col-5">
									<option selected value=""></option>
									<option ng-repeat="client in Clients" value="{{ client.id }}">{{ client.client_name }}</option>
								</select>-->
							</div>
							<!--<div>
								<a href="recursos/clients" class="col-5">
									<button type="button" class="btn btn-default btn-lg" style="background-color:yellow;margin-top: 19px;">
										<spam class="fa fa-arrow-right" style="font-size:20px;color:lightblue;text-shadow:2px 2px 4px #000000;"></spam>
										Agregar Cliente
									</button>
								</a>
							</div>-->
							<div>
								<label>Imágen</label>
								<input type="text" class="form-control col-5" value="Imagen">
							</div>
						</div>
						<div>
							<label for="DetalledeTrabajo">Detalle de Trabajo</label>
							<textarea ng-model="OT_detail_modify" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
						</div><br>
						<div style="display: block; width:max-content;">
							<label>Elementos a utilizar</label>
							<table border=1 class="form-control" style="display:contents; border: 1px solid black;width:97%; margin:10px;padding:5px;">
								<tbody>
									<!--<tr>
										<td colspan="3" style="text-align: center;">Elementos a utilizar</td>
										<td></td>
										<td></td>
										<td></td>
										<td colspan="2" style="text-align: right;">
											<input type="button" class="btn btn-warning" style="color: black;" value="Agregar Elemento" ng-model="Add;" ng-click="AddElement();"></td>
									</tr>-->
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
										<td>{{ Ot_modify.Rel_quantity * Ot_modify.Rel_height * Ot_modify.Rel_width * Ot_modify.Rel_quantity | number }}</td>
										<td><i class="fa fa-remove btn btn-danger" data-toggle="modal" data-target="#myModalDeleteProduct" ng-click="CargarIdRelacion(Ot_modify.id);">X</i></td>
									</tr>
									<tr style="vertical-align: top;">
										<td><select class="form-control" style="width:175px;" ng-model="selectproduct" ng-change="CargarDatosProducto(selectproduct);">
												<option value="" selected></option>
												<option ng-repeat="product in Products" value="{{ product.id }}">{{ product.product_description }}</option>
											</select>
										</td>
										<td><input class="form-control txtbox" type="text" placeholder="Cantidad" ng-model="Detail_quantity" ng-value="Detail_quantity" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="Ancho" ng-model="Detail_width" ng-value="Detail_width" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="Alto" ng-model="Detail_height" ng-value="Detail_height" style="width:100px" ng-change="CalcularTotal(); CalcularM2();"></td>
										<td><input class="form-control txtbox" type="text" placeholder="PrecioM2" ng-model="product_price" ng-value="product_price" style="width:100px" ng-change="CalcularTotal();" disabled></td>

										<td><input class="form-control txtbox" type="text" ng-model="m2" placeholder="{{ Detail_quantity* Detail_height * Detail_width | number }}" disabled style="width:100px"></td>
										<td><input class="form-control txtbox" type="text" placeholder="{{ Detail_quantity* Detail_height * Detail_width * product_price| number }}" ng-model="Detail_total" style="width:100px" disabled></td>
										<td><i class="fa fa-refresh btn btn-success" ng-click="InsertRelacion(product.id);GetProducts();">-></i></td>


									</tr>
									<tr>
										<?php $total = 0; ?>
									</tr>
									<tr>
										<td colspan=6></td>
										<td>Total</td>
										<td>{{ $total }}</td>
									</tr>
									</tr>
								</tbody>
							</table>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="InsertClient(1);" style="font-size: 0.8em;">Agregar</button>
						<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
					</div>

				</div>
			</div>
		</div> <!-- //Modify OT -->

		<!--  DELETE PRODUCT 
              ----------------- -->
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
										Seguro que quiere eliminar el producto {{ product_description }}?
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="DeleteProduct(IdRelacion);" style="font-size: 0.8em;">Eliminar</button>
						<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 0.8em;">Cerrar</button>
					</div>
				</div>
			</div>
		</div> <!-- //Delete product -->

	</div>


	</div>

	<div class="container">
		<div class="row" style="display: flex;">
			<div class="card">
				<div>
					<img src="assets/kate-trysh-Dnkr_lmdKi8-unsplash.jpg" alt="" style="width:100%; height:100px">
				</div>
				<h5 class="card-title">Ordenes de Trabajo</h5>
				<div class="card-body">
					<a href="recursos/OT" class="btn btn-primary">Órdenes de Trabajo</a>
				</div>
			</div>
			<div class="card">
				<div>
					<img src="assets/clients.jpg" alt="" style="width:100%; height:100px">
				</div>
				<h5 class="card-title">Clientes</h5>
				<div class="card-body">
					<a href="recursos/clients" class="btn btn-primary">Clientes</a>
				</div>
			</div>
			<div class="card">
				<div>
					<img src="assets/products.jpg" alt="" style="width:100%; height:100px">
				</div>
				<h5 class="card-title">Productos</h5>
				<div class="card-body">
					<a href="recursos/products" class="btn btn-primary">Productos</a>
				</div>
			</div>
			<div class="card">
				<div>
					<img src="assets/pays.jpg" alt="" style="width:100%; height:100px">
				</div>
				<h5 class="card-title">Formas de Pago</h5>
				<div class="card-body">
					<a href="recursos/forms" class="btn btn-primary">Formas de Pago</a>
				</div>
			</div>
			<div class="card">
				<div>
					<img src="assets/pricelist.jpg" alt="" style="width:100%; height:100px">
				</div>
				<h5 class="card-title">Listas de Precio</h5>
				<div class="card-body">
					<a href="recursos/lists" class="btn btn-primary">Listas de Precio</a>
				</div>
			</div>

		</div>
	</div>
</body>

</html>