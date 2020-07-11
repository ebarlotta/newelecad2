
<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <title>@yield('title')</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
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
            @if (Session::has('message'))
                <div class="alert alert-success" style="margin: 20px;" id="successMessage" ng_model="success">
                    {{ Session('message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger" style="margin: 20px;">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 main-section" style="background-color:black;">
                @include('layouts.app')
                </div>
            </div>
        </div>
        
        <div class="container page">
            <div class="row" style="display: flex;">            
            <!--<div style="width:50%"></div>-->
                @yield('menu')
                
                @yield('areadetrabajo')
            </div>
        </div>
        
        @yield('scripts')
    
    </body>
</html>