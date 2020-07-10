<?php
session_start();
?>
<!DOCTYPE html>
<html ng-app="datosApp">
<?php
$_SESSION['Modulo'] = "E L E C A D";
//include "../navbar.php";
?>

<head>
	<title>Elecad</title>
	<meta charset="utf-8">
	<title>Elecad</title>
	<script type="text/javascript" src="bootstrap/angular.min.js"></script>

	<script type="text/javascript" src="principalController.js"> </script>
	<meta http-equiv=amp;quot;X-UA-Compatibleamp;quot; content=amp;quot;IE=edgeamp;quot;>
	<meta name=amp;quot;viewportamp;quot; content=amp;quot;width=device-width, initial-scale=1amp;quot;>
	<meta name="viewport" content="width=device-width, initial - scale=1.0">

	<!-- Librerias para generar PDF -->
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.4/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

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
</head>

<body ng-controller="principalController" ng-init="inicializar();" style="font-size: 1.7em;">
	<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Products</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		<!-- Flash message-->
		<script type="text/javascript">
			window.setTimeout("document.getElementById('successMessage').style.display='none';", 3000);
			//window.fadeOut("document.getElementById('successMessage');", 300); 
		</script>

		<script type="text/javascript">
			function CalcularTotal() {
				var total;
				var metros;

				total = parseFloat(Detail_quantity.value) * parseFloat(Detail_width.value) * parseFloat(Detail_height.value) * parseFloat(Detail_price.value);
				metros = parseFloat(Detail_width.value) * parseFloat(Detail_height.value);
				if (total > 0) {
					Detail_total.value = total;
					m2.value = metros;
				} else {
					Detail_total.value = 0;
					m2.value = 0;
				}
			}

			function soloNumero(vnum, nent, nfra) {
				if (event.keyCode !== 46 && ((event.keyCode < 48) || (event.keyCode > 57))) return false;
				if (event.keyCode == 46 && (vnum.indexOf(".") !== -1)) return false;
				if (event.keyCode !== 46 && vnum.length >= nent && vnum.indexOf(".") == -1) return false;
				var auxn = vnum.split(".");
				if (auxn[1] && auxn[1].length >= nfra) return false;
				return true;
			}
		</script>
	</head>

	<body style="background-color:black;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-12 main-section" style="background-color:black;">
					<!doctype html>
					<html lang="en">
					<head>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1">

						<!-- CSRF Token -->
						<meta name="csrf-token" content="W4lTtVjuYCTF6ARNTQ5okShHHQAN5N7nDvgj5zVa">

						<title>Elecad</title>

						<!-- Fonts -->
						<link rel="dns-prefetch" href="//fonts.gstatic.com">
						<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

					</head>

					<body>
						<div id="app">
							<main class="py-4">
								<div class="container" style="width:100%;">
									<div class="row">
										<div class="column" style="width:24%; padding-right: 5px;">
											<a href="recursos/home/1" class="menu">
												<div class="notice notice-success menu align-self-center text-center">
													<strong>1 </strong>Diseños
												</div>
											</a>
											<a href="recursos/home/2" class="menu align-self-center text-center">
												<div class="notice notice-danger menu">
													<strong>2</strong> Impresiones Laser
												</div>
											</a>
											<a href="recursos/home/3" class="menu align-self-center text-center">
												<div class="notice notice-info menu">
													<strong>3</strong> Enviados a Imprimir
												</div>
											</a>
											<a href="recursos/home/4" class="menu align-self-center text-center">
												<div class="notice notice-warning menu">
													<strong>4</strong> Imprimiendo
												</div>
											</a>
											<a href="recursos/home/5" class="menu align-self-center text-center">
												<div class="notice notice-success menu">
													<strong>5</strong> Trabajo Impreso
												</div>
											</a>
											<a href="recursos/home/6" class="menu align-self-center text-center">
												<div class="notice notice-danger menu">
													<strong>6</strong> Terminaciones
												</div>
											</a>
											<a href="recursos/home/7" class="menu align-self-center text-center">
												<div class="notice notice-info menu">
													<strong>7</strong> Listo para entregar
												</div>
											</a>
											<a href="recursos/home/8" class="menu align-self-center text-center">
												<div class="notice notice-warning menu">
													<strong>8</strong> Trabajos Retirados
												</div>
											</a>
											<a href="recursos/home/9">
												<div class="notice notice-success menu align-self-center text-center">
													<strong>9</strong> Trabajos a enviar
												</div>
											</a>
										</div>
										<div style="width:75%;height:100%; background-color: red; background-image: linear-gradient( to right, red, #f06d06, rgb(255, 255, 0), green ); opacity: 0.9; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="gradient">

											<a href="recursos/OT/4" style="text-decoration: none;">
												<div class="card-list">
													<div class="row" style="align-items:center; justify-content: space-around;display:flex;">

														<img src="assets/sinfoto.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
														<div>
															<img style="border-radius: 5%;" src="/images/1591960849Captura de pantalla de 2020-06-11 15-36-03.png" width="60px;" height="60px;">
														</div>
														<div style="font-size:18px;">pepito - 33245663</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</main>
						</div>
					</body>
					</html>
				</div>
			</div>
		</div>

		<div class="container page">
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