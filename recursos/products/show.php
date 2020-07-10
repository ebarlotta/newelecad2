<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <title></title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="recursos/css/style.css">
    
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

                total = parseFloat(Detail_quantity.value)*parseFloat(Detail_width.value)*parseFloat(Detail_height.value)*parseFloat(Detail_price.value);
                metros = parseFloat(Detail_width.value)*parseFloat(Detail_height.value);
                if(total>0) {
                    Detail_total.value = total; 
                    m2.value = metros;
                }
                else {
                    Detail_total.value = 0; 
                    m2.value = 0;
                }
            }

            function soloNumero(vnum,nent,nfra) {
                if (event.keyCode !== 46 && ((event.keyCode < 48) || (event.keyCode > 57))) return false;
                if (event.keyCode == 46 && (vnum.indexOf(".") !== -1)) return false;
                if (event.keyCode !== 46 && vnum.length >= nent && vnum.indexOf(".") == -1) return false;
                var auxn = vnum.split(".");
                if (auxn[1] && auxn[1].length >= nfra) return false;
                return true;
            }

        </script>                    

        <script>
        //<link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
        @media (min-width: 576px) {
            .col-sm-1 {
                flex: 0 0 100%; !important
                max-width: 100%; !important
            }
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

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="recursos/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="recursos/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="recursos">
                    Elecad
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
                    </main>
    </div>
</body>
</html>
                </div>
            </div>
        </div>
        
        <div class="container page">
            <div class="row" style="display: flex;">            
            <!--<div style="width:50%"></div>-->
                                
                 
        <div class="column">
            <p class="btn-holder" style="margin-bottom: 0rem;">
                <a href="recursos/products/create" class="btn btn-info Add" role="button">
                    Agregar Producto
                </a>
            </p>
            <div>
                <table class="table-holder table-responsive table-dark table-striped">
                    <thead style="text-align:center">
                        <th style="text-align:center">Descripción</th>
                        <th style="text-align:center">Precio m2</th>
                        <th style="text-align:center">Unidad</th>
                        <th style="text-align:center">Lista</th>
                        <th style="text-align:center">Opciones</th>
                    </thead>
                    <tbody>
                        
                                                <tr>
                            <td> lona</td>
                            <td style="text-align:right"> $ 1.234,00</td>
                            <td> metros cuadrados</td>
                            <td> Contado</td>
                            <td>
                                <a href="recursos/products/1/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/1/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> Loooma</td>
                            <td style="text-align:right"> $ 32,00</td>
                            <td> metros lineales</td>
                            <td> Publico</td>
                            <td>
                                <a href="recursos/products/2/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/2/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> Loooma22</td>
                            <td style="text-align:right"> $ 44,00</td>
                            <td> metros cuadrados</td>
                            <td> Publico</td>
                            <td>
                                <a href="recursos/products/3/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/3/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> Loooma33</td>
                            <td style="text-align:right"> $ 72,00</td>
                            <td> metros lineales</td>
                            <td> Publico</td>
                            <td>
                                <a href="recursos/products/4/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/4/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> Loooma44</td>
                            <td style="text-align:right"> $ 111,11</td>
                            <td> metros lineales</td>
                            <td> Publico</td>
                            <td>
                                <a href="recursos/products/5/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/5/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> Loooma55</td>
                            <td style="text-align:right"> $ 457,00</td>
                            <td> metros lineales</td>
                            <td> Contado</td>
                            <td>
                                <a href="recursos/products/6/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/6/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                                <tr>
                            <td> nuevo</td>
                            <td style="text-align:right"> $ 1.234,00</td>
                            <td> metros lineales</td>
                            <td> Contado</td>
                            <td>
                                <a href="recursos/products/8/edit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="recursos/products/8/destroy" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                                            </tbody>
                </table>
            </div>
            <a href="recursos/home/1" class="btn btn-info Back">Volver</a>
        </div><!-- End row -->
    </div>

            </div>
        </div>
        
            
    </body>
</html>