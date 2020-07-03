var misDatos = angular.module('datosApp', []);

misDatos.controller('controladorVentas',function($scope,$http){

    // CONTROLADOR DE CLIENTES
    //------------------------

    $scope.inicializar = function(){
        let Meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        let fecha = new Date();
        var NumeroMes = parseInt(fecha.getMonth());
        $scope.MostrarEspera=0;

        $scope.FAnio="2020"; // Establecer Año
        $scope.CCAnio="2020";
        $scope.PAnio="2020";
        $scope.CRAnio="2020";
        $scope.ASAnio="2020";
        $scope.LAnio="2020";
        $scope.CLAnio="2020";

        $scope.FMes=Meses[NumeroMes];
        $scope.CCMes=Meses[NumeroMes];
        $scope.LMes=Meses[NumeroMes];
        $scope.CLMes=Meses[NumeroMes];
        $scope.MAPasado=Meses[NumeroMes];
        //console.log("PPP"+$scope.MAPasado);
        
        $scope.MABrutoto=0;
        $scope.MAExento=0;
        $scope.MAImpInterno=0;
        $scope.MAPer=0;
        $scope.MARet=0;
        $scope.MARetGan=0;
        $scope.MACantidad=0;

        Opcion='inicializar';
        Param='';
        $http.get('recursos/DevolverDatos.php?Opcion='+Opcion+'&Param='+Param)
        .then(function(datos){
            $scope.Clientes={};
            $scope.IdCliente=0;
            $scope.CCCliente=0;
            $scope.Clientes=datos;
            $scope.Clientes2=datos;

        });
        Opcion='Areas';
        Param='';
        $http.get('recursos/DevolverDatos.php?Opcion='+Opcion+'&Param='+Param)
        .then(function(datos){
            $scope.Areas={};
            $scope.IdArea=0;
            $scope.IdArea=datos.data[0].IdArea;
            $scope.Areas=datos;
        });
        Opcion='Cuentas';
        Param='';
        $http.get('recursos/DevolverDatos.php?Opcion='+Opcion+'&Param='+Param)
        .then(function(datos){
            $scope.Cuentas={};
            $scope.IdCuenta=0;
            $scope.IdCuenta=datos.data[0].IdCuenta;
            $scope.Cuentas=datos;
        });
        $scope.LlamarFiltro();
    }

    var formatNumber = {
     separador: ".", // separador para los miles
     sepDecimal: ',', // separador para los decimales
     formatear:function (num){
     num +='';
     var splitStr = num.split('.');
     var splitLeft = splitStr[0];
     var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
     var regx = /(\d+)(\d{3})/;
     while (regx.test(splitLeft)) {
     splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
     }
     return this.simbol + splitLeft +splitRight;
     },
     new:function(num, simbol){
     this.simbol = simbol ||'';
     return this.formatear(num);
     }
    }
    
    $scope.LlamarFiltro = function(){
    	$scope.loading=true;
        $http.get('recursos/LlamarFiltro.php?IdCliente='+$scope.search
                 +'&Mes='+$scope.FMes
                 +'&Participa='+$scope.FParticipa
                 +'&IdArea='+$scope.FArea
                 +'&IdCuenta='+$scope.FCuenta
                 +'&Anio='+$scope.FAnio
                 +'&Detalle='+$scope.FDetalle)
        .then(function(datos){
            $scope.Comprobantes={};
            
            $scope.TotalBruto=0; $scope.TotalIva=0; $scope.TotalExento=0; $scope.TotalImpInterno=0; $scope.TotalPercepcion=0; $scope.TotalRetencion=0;
            $scope.TotalGanancia=0; $scope.TotalNeto=0; $scope.TotalPagado=0; $scope.TotalCantidad=0; $scope.TotalSaldo=0;
            
            $scope.Comprobantes=datos.data;
            $scope.TotalBruto=formatNumber.new(datos.data.TotalBruto.toFixed(2),"$");
            $scope.TotalIva=formatNumber.new(datos.data.TotalIva.toFixed(2),"$");
            $scope.TotalExento=formatNumber.new(datos.data.TotalExento.toFixed(2),"$");
            $scope.TotalImpInterno=formatNumber.new(datos.data.TotalImpInterno.toFixed(2),"$");
            $scope.TotalPercepcion=formatNumber.new(datos.data.TotalPercepcion.toFixed(2),"$");
            $scope.TotalRetencion=formatNumber.new(datos.data.TotalRetencion.toFixed(2),"$");
            $scope.TotalGanancia=formatNumber.new(datos.data.TotalGanancia.toFixed(2),"$");
            $scope.TotalNeto=formatNumber.new(datos.data.TotalNeto.toFixed(2),"$");
            $scope.TotalPagado=formatNumber.new(datos.data.TotalPagado.toFixed(2),"$");
            $scope.TotalCantidad=formatNumber.new(datos.data.TotalCantidad.toFixed(2)," ");
            $scope.TotalSaldo=formatNumber.new(datos.data.TotalSaldo.toFixed(2),"$");      
            $scope.loading=false;
            $scope.MostrarEspera=0;
        });
    }

    $scope.LlamarFiltro2 = function(){
        $http.get('recursos/LlamarFiltro2.php?IdCliente='+$scope.search2
                 +'&Mes='+$scope.CCMes
                 +'&Participa='+$scope.CCParticipa
                 +'&IdArea='+$scope.CCArea
                 +'&IdCuenta='+$scope.CCCuenta
                 +'&Anio='+$scope.CCAnio
                 +'&Desde='+$scope.CCFDesde
                 +'&Hasta='+$scope.CCFHasta
                 +'&Detalle='+$scope.CCDetalle
                 +'&IVA='+$scope.CCIva
                 +'&Asc='+$scope.CCAsc)
        .then(function(datos){
            $scope.Comprobantes2={};
            $scope.Comprobantes2=datos.data;

            $scope.TotalBruto2=0; $scope.TotalIva2=0; $scope.TotalExento2=0; $scope.TotalImpInterno2=0; $scope.TotalPercepcion2=0; $scope.TotalRetencion2=0; 
            $scope.TotalGanancia2=0; $scope.TotalNeto2=0; $scope.TotalPagado2=0; $scope.TotalCantidad2=0; $scope.TotalSaldo2=0;

            $scope.TotalBruto2=formatNumber.new(datos.data.TotalBruto2.toFixed(2),"$");
            $scope.TotalIva2=formatNumber.new(datos.data.TotalIva2.toFixed(2),"$");
            $scope.TotalExento2=formatNumber.new(datos.data.TotalExento2.toFixed(2),"$");
            $scope.TotalImpInterno2=formatNumber.new(datos.data.TotalImpInterno2.toFixed(2),"$");
            $scope.TotalPercepcion2=formatNumber.new(datos.data.TotalPercepcion2.toFixed(2),"$");
            $scope.TotalRetencion2=formatNumber.new(datos.data.TotalRetencion2.toFixed(2),"$");
            $scope.TotalGanancia2=formatNumber.new(datos.data.TotalGanancia2.toFixed(2),"$");
            $scope.TotalNeto2=formatNumber.new(datos.data.TotalNeto2.toFixed(2),"$");
            $scope.TotalPagado2=formatNumber.new(datos.data.TotalPagado2.toFixed(2),"$");
            $scope.TotalCantidad2=formatNumber.new(datos.data.TotalCantidad2.toFixed(2)," ");
            $scope.TotalSaldo2=formatNumber.new(datos.data.TotalSaldo2.toFixed(2),"$");
        });
    }

    $scope.SolicitarDeudaClientes = function(){
        MesDesde = "0" + $scope.PDesde.getMonth($scope.PDesde);
        MesDesde = MesDesde.substring(MesDesde.length - 2, MesDesde.length)
        MesHasta = "0" + $scope.PHasta.getMonth();
        MesHasta = MesHasta.substring(MesHasta.length - 2, MesHasta.length)

        DiaDesde= "0" + $scope.PDesde.getDay();
        DiaDesde = DiaDesde.substring(DiaDesde.length - 2, DiaDesde.length)
        DiaHasta= "0" + $scope.PHasta.getDay();
        DiaHasta = DiaHasta.substring(DiaHasta.length - 2, DiaHasta.length)

        Desde = $scope.PDesde.getFullYear() + "-" + MesDesde + "-" + DiaDesde;
        //console.log(Desde);

        Hasta = $scope.PHasta.getFullYear() + "-" + MesHasta + "-" + DiaHasta
        //console.log(Hasta);

        $http.get('recursos/SolicitarDeudaClientes.php?Desde='+$scope.PDesde
                                            +'&Hasta='+$scope.PHasta
                                            +'&Anio='+$scope.PAnio
                                            +'&Unidad='+$scope.PUnidad)
            .then(function(datos){
                $scope.DeudasClientes=datos.data;
                $scope.TotalDeuda=formatNumber.new(datos.data.TotalDeuda.toFixed(2),"$");
                $scope.MostrarEspera=0;
            });
    }

    $scope.showWait = function() {
        if($scope.MostrarEspera==0) {
            $scope.MostrarEspera=1;
            	$scope.SolicitarDeudaClientes();
        } else {
            $scope.MostrarEspera=0;
        }
    }

    $scope.showWaitFiltro = function() {
        if($scope.MostrarEspera==0) {
            $scope.MostrarEspera=1;
            	$scope.LlamarFiltro();
        } else {
            $scope.MostrarEspera=0;
        }
    }
    
    $scope.DibujarLibrosCerrados = function(Anio){
        $scope.LibrosCerrados={};
        $http.get('recursos/DibujarLibrosCerrados.php?Anio='+Anio)
            .then(function(datos){
                $scope.LibrosCerrados=datos.data;   
            });
    }

    $scope.CargarDatosComprobante = function(IdComp){
        $scope.IdComp=IdComp;

        Opcion='CargarDatosComprobantes';
        Param=IdComp;
        $http.get('recursos/DevolverDatos.php?Opcion='+Opcion+'&Param='+Param)
        .then(function(datos){
            $scope.MMFecha      = new Date(datos.data[0].FechaComp);
            $scope.MMCliente    =datos.data[0].CuitComp;
            $scope.MMComprobante=datos.data[0].NroComp;
            $scope.MMDetalle    =datos.data[0].DetalleComp;
            $scope.MMAnio       =datos.data[0].Anio;
            $scope.MMPasado     =datos.data[0].PasadoEnMes;
            $scope.MMArea       =datos.data[0].DescripcionAreas;
            $scope.MMCuenta     =datos.data[0].DescripcionCuentas;
            $scope.MMBruto      =datos.data[0].BrutoComp;
            $scope.MMParticipa  =datos.data[0].ParticipaEnIva;
            $scope.MMIva        =datos.data[0].IvaComp;
            $scope.MMExento     =datos.data[0].ExentoComp;
            $scope.MMImpInterno =datos.data[0].ImpInternoComp;
            $scope.MMPer        =datos.data[0].PercepcionIvaComp;
            $scope.MMRet        =datos.data[0].RetencionIB;
            $scope.MMRetGan     =datos.data[0].Ganancias;
            $scope.MMNeto       =datos.data[0].NetoComp;
            $scope.MMPagado     =datos.data[0].MontoPagadoComp;
            $scope.MMCantidad   =datos.data[0].CantidadLitroComp;
            
            //console.log("Area:".$scope.MMArea." Cuenta:".$scope.MMCuenta);
            $scope.MARPagado = 0;
            $scope.MARFecha      = new Date();
            ////$scope.MARFecha      = datos.data[0].FechaComp.getTime();
            //console.log($scope.MARFecha);
            $scope.MARCliente    =datos.data[0].CuitComp;
            //$scope.MARComprobante=datos.data[0].NroComp;
            $scope.MARComprobanteRecibo="R-" + $scope.IdComp;
            //console.log($scope.MARComprobanteRecibo);
            $scope.MARDetalle    =datos.data[0].DetalleComp;
            $scope.MARAnio       =datos.data[0].Anio;
            $scope.MARPasado     =datos.data[0].PasadoEnMes;
            $scope.MARArea       =datos.data[0].DescripcionAreas;
            $scope.MARCuenta     =datos.data[0].DescripcionCuentas;
            /*$scope.MARBruto      =datos.data[0].BrutoComp;
            $scope.MARParticipa  =datos.data[0].ParticipaEnIva;
            $scope.MARIva        =datos.data[0].IvaComp;
            $scope.MARExento     =datos.data[0].ExentoComp;
            $scope.MARImpInterno =datos.data[0].ImpInternoComp;
            $scope.MARPer        =datos.data[0].PercepcionIvaComp;
            $scope.MARRet        =datos.data[0].RetencionIB;
            $scope.MARRetGan     =datos.data[0].Ganancias;
            $scope.MARNeto       =datos.data[0].NetoComp;*/
            $scope.MARPagado     =datos.data[0].MontoPagadoComp;
            $scope.MARCantidad   =datos.data[0].CantidadLitroComp;
            
            //console.log("Monto" + $scope.MARPagado);
        });
    }

    $scope.CargarDatosComprobanteParaAlta = function(){
        Opcion='CargarDatosComprobantes';
        Param=$scope.IdComp;
        $http.get('recursos/DevolverDatos.php?Opcion='+Opcion+'&Param='+Param)
        .then(function(datos){
            $scope.MAFecha      = new Date(datos.data[0].FechaComp);
            $scope.MACliente    =datos.data[0].CuitComp;
            $scope.MAComprobante=datos.data[0].NroComp;
            $scope.MADetalle    =datos.data[0].DetalleComp;
            $scope.MAAnio       =datos.data[0].Anio;
            $scope.MAPasado     =datos.data[0].PasadoEnMes;
            $scope.MAArea       =datos.data[0].DescripcionAreas;
            $scope.MACuenta     =datos.data[0].DescripcionCuentas;
            $scope.MABruto      =datos.data[0].BrutoComp;
            $scope.MAParticipa  =datos.data[0].ParticipaEnIva;
            $scope.MAIva        =datos.data[0].IvaComp;
            $scope.MAExento     =datos.data[0].ExentoComp;
            $scope.MAImpInterno =datos.data[0].ImpInternoComp;
            $scope.MAPer        =datos.data[0].PercepcionIvaComp;
            $scope.MARet        =datos.data[0].RetencionIB;
            $scope.MARetGan     =datos.data[0].Ganancias;
            $scope.MANeto       =datos.data[0].NetoComp;
            $scope.MAPagado     =datos.data[0].MontoPagadoComp;
            $scope.MACantidad   =datos.data[0].CantidadLitroComp;
            //console.log("Per" + datos.data);
        });
    }
    
    $scope.Imprimir = function(){
    	
        /*var dd = {
        		content: [
        			{
        				text: 'This paragraph uses header style and extends the alignment property',
        				style: 'header',
        				alignment: 'center'
        			},
        			{
        				text: [
        					'This paragraph uses header style and overrides bold value setting it back to false.\n',
        					'Header style in this example sets alignment to justify, so this paragraph should be rendered \n',
        					'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
        					],
        				style: 'header',
        				bold: false
        			}
        		],
        		styles: {
        			header: {
        				fontSize: 18,
        				bold: true,
        				alignment: 'justify'
        			}
        		}
        		
        	};
        $scope.data6=  [{"agence":"CTM","secteur":"Safi","statutImp":"operationnel"}];
        $scope.data6=  "ReciboRecibimos la cantidad de $ / U$S" + $scope.MARPagado;
        //$scope.data6=dd;
        
        imagen1 = 'assets/img/tc.jpg';
        imagen2 = 'assets/img/pm.jpg';
        imagen3 = 'assets/img/al.jpg';

        	
      	    html2canvas(document.getElementById('exportthis'), {
              allowTaint: true,
              useCORS: false,
              scale: 1
            }).then(function(canvas) {
      		    var img = canvas.toDataURL("image/png");
      		    var doc = new jsPDF();
      		    doc.addImage(img,'PNG',7, 20, 195, 105);
      		    doc.save('postres.pdf');
      	    });
    	
        
        html2canvas(document.getElementById('exportthis'), {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                		content: [
                			{
                				text: 'This paragraph uses header style and extends the alignment property',
                				//style: 'header',
                				//alignment: 'center'
                			} /*,
                			{
                				text: [
                					'This paragraph uses header style and overrides bold value setting it back to false.\n',
                					'Header style in this example sets alignment to justify, so this paragraph should be rendered \n',
                					'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
                					//],
                					]
                				//style: 'header',
                				//bold: false
                			}
                		],
                		/*styles: {
                			header: {
                				fontSize: 18,
                				bold: true,
                				alignment: 'justify'
                			}
                		}*/

                    	/*content: [{
                        	image: data,
                        	width: 500,
                    	}]
                			]
                };

                pdfMake.createPdf(docDefinition).download("test.pdf");
            }
        });*/
    	
    	
        //$EventImprimir="onClick=\"var PasadoEnMes=getElementById('LibroMes') ; var Anio=getElementById('LibroAnio'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value + '&Anio=' + Anio.value + '&Compra=1'; window.open(xxx,'nuevaVentana','width=300, height=400')\"";
     //xxx='../ReciboPDF.php?Fecha='+$scope.MARFecha+'&Cliente='+$scope.MARCliente+'&Comprobante='+$scope.IdComp+'&Detalle='+$scope.MARDetalle+'&Anio='+$scope.MARAnio+'&PasadoEnMes='+$scope.MARPasado+'&Area='+$scope.MARArea+'&Cuenta='+$scope.MARCuenta+'&Pagado='+numeroALetras($scope.MARPagado)+'&Monto='+$scope.MARPagado;

//        xxx='../ReciboPDF.php?Fecha='+$scope.MARFecha+'&Cliente='+$scope.MARCliente+'&Comprobante='+$scope.IdComp+'&Detalle='+$scope.MARDetalle+'&Anio='+$scope.MARAnio+'&PasadoEnMes='+$scope.MARPasado+'&Area='+$scope.MARArea+'&Cuenta='+$scope.MARCuenta+'&Pagado='+numeroALetras($scope.MMNeto)+'&Monto='+$scope.MMNeto;
//        window.open(xxx,'nuevaVentana','width=300, height=400')

        xxx='../ReciboPDF.php?Fecha='+$scope.MARFecha+'&Cliente='+$scope.MARCliente+'&Comprobante='+$scope.IdComp+'&Detalle='+$scope.MARDetalle+'&Anio='+$scope.MARAnio+'&PasadoEnMes='+$scope.MARPasado+'&Area='+$scope.MARArea+'&Cuenta='+$scope.MARCuenta+'&Pagado='+numeroALetras($scope.MontoRecibo)+'&Monto='+$scope.MontoRecibo;
        window.open(xxx,'nuevaVentana','width=300, height=400')
     }
    
    
    $scope.CalcularNeto = function(){
        a=parseFloat($scope.MABruto)+parseFloat($scope.MAExento)+parseFloat($scope.MAImpInterno)+parseFloat($scope.MAPer)+parseFloat($scope.MARet)+parseFloat($scope.MARetGan);
        $scope.MANeto=a.toFixed(2);
        if($scope.MAParticipa=="Si") {
            a=(parseFloat($scope.MABruto)*parseFloat($scope.MAIva)/100)+parseFloat($scope.MANeto);
            $scope.MANeto=a.toFixed(2);
        }
    }

    $scope.CalcularNetoModalModif = function(){
        a=parseFloat($scope.MMBruto)+parseFloat($scope.MMExento)+parseFloat($scope.MMImpInterno)+parseFloat($scope.MMPer)+parseFloat($scope.MMRet)+parseFloat($scope.MMRetGan);
        $scope.MMNeto=a.toFixed(2);
        if($scope.MMParticipa=="Si") {
            a=(parseFloat($scope.MMBruto)*parseFloat($scope.MMIva)/100)+parseFloat($scope.MMNeto);
            $scope.MMNeto=a.toFixed(2);
        }
    }

    $scope.ModificarComprobante = function(){
        $http.get('recursos/ModificarComprobante.php?MMCliente='+$scope.MMCliente
                 +'&MMFecha='+$scope.MMFecha.getTime()
                 +'&MMComprobante='+$scope.MMComprobante
                 +'&MMDetalle='+$scope.MMDetalle
                 +'&MMAnio='+$scope.MMAnio
                 +'&MMPasado='+$scope.MMPasado
                 +'&MMArea='+$scope.MMArea
                 +'&MMCuenta='+$scope.MMCuenta
                 +'&MMBruto='+$scope.MMBruto
                 +'&MMParticipa='+$scope.MMParticipa
                 +'&MMIva='+$scope.MMIva
                 +'&MMExento='+$scope.MMExento
                 +'&MMImpInterno='+$scope.MMImpInterno
                 +'&MMRet='+$scope.MMRet
                 +'&MMPer='+$scope.MMPer
                 +'&MMRetGan='+$scope.MMRetGan
                 +'&MMNeto='+$scope.MMNeto
                 +'&MMPagado='+$scope.MMPagado
                 +'&MMCantidad='+$scope.MMCantidad
                 +'&IdComp='+$scope.IdComp)
        .then(function(datos){

        });
        $scope.LlamarFiltro();
    }

$scope.AgregarComprobante = function(){
        $http.get('recursos/AgregarComprobante.php?MACliente='+$scope.MACliente
                 +'&MAFecha='+$scope.MAFecha.getTime()
                 +'&MAComprobante='+$scope.MAComprobante
                 +'&MADetalle='+$scope.MADetalle
                 +'&MAAnio='+$scope.MAAnio
                 +'&MAPasado='+$scope.MAPasado
                 +'&MAArea='+$scope.MAArea
                 +'&MACuenta='+$scope.MACuenta
                 +'&MABruto='+$scope.MABruto
                 +'&MAParticipa='+$scope.MAParticipa
                 +'&MAIva='+$scope.MAIva
                 +'&MAExento='+$scope.MAExento
                 +'&MAImpInterno='+$scope.MAImpInterno
                 +'&MARet='+$scope.MARet
                 +'&MAPer='+$scope.MAPer
                 +'&MARetGan='+$scope.MARetGan
                 +'&MANeto='+$scope.MANeto
                 +'&MAPagado='+$scope.MAPagado
                 +'&MACantidad='+$scope.MACantidad) //                 +'&IdComp='+$scope.IdComp)
        .then(function(datos){
        });
        $scope.LlamarFiltro();
    }

$scope.AgregarComprobanteRecibo = function(){
    $http.get('recursos/AgregarComprobanteRecibo.php?MACliente='+$scope.MARCliente
             +'&MAFecha=' + $scope.MARFecha.getTime()+86400000
             +'&MAComprobante='+$scope.MARComprobanteRecibo
             +'&MADetalle='+$scope.MARDetalle
             +'&MAAnio='+$scope.MARAnio
             +'&MAPasado='+$scope.MARPasado
             +'&MAArea='+$scope.MARArea
             +'&MACuenta='+$scope.MARCuenta
             +'&MABruto='+$scope.MARBruto
             +'&MAParticipa='+$scope.MARParticipa
             +'&MAIva='+$scope.MARIva
             +'&MAExento='+$scope.MARExento
             +'&MAImpInterno='+$scope.MARImpInterno
             +'&MARet='+$scope.MARRet
             +'&MAPer='+$scope.MARPer
             +'&MARetGan='+$scope.MARRetGan
             +'&MANeto='+$scope.MARNeto
             +'&MAPagado='+$scope.MontoRecibo
             +'&MACantidad='+$scope.MARCantidad) //                 +'&IdComp='+$scope.IdComp)
    .then(function(datos){
    });
    $scope.LlamarFiltro();
}


$scope.EliminarComprobante = function(){
        $http.get('recursos/EliminarComprobante.php?IdComp='+$scope.IdComp)
        .then(function(datos){
        });
        $scope.LlamarFiltro();
    }

    $scope.parseFloat = function(value)
    {
        return parseFloat(value);
    }
    
    
    
    var numeroALetras = (function() {

    	// Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    	    function Unidades(num){

    	        switch(num)
    	        {
    	            case 1: return 'UN';
    	            case 2: return 'DOS';
    	            case 3: return 'TRES';
    	            case 4: return 'CUATRO';
    	            case 5: return 'CINCO';
    	            case 6: return 'SEIS';
    	            case 7: return 'SIETE';
    	            case 8: return 'OCHO';
    	            case 9: return 'NUEVE';
    	        }

    	        return '';
    	    }//Unidades()

    	    function Decenas(num){

    	        let decena = Math.floor(num/10);
    	        let unidad = num - (decena * 10);

    	        switch(decena)
    	        {
    	            case 1:
    	                switch(unidad)
    	                {
    	                    case 0: return 'DIEZ';
    	                    case 1: return 'ONCE';
    	                    case 2: return 'DOCE';
    	                    case 3: return 'TRECE';
    	                    case 4: return 'CATORCE';
    	                    case 5: return 'QUINCE';
    	                    default: return 'DIECI' + Unidades(unidad);
    	                }
    	            case 2:
    	                switch(unidad)
    	                {
    	                    case 0: return 'VEINTE';
    	                    default: return 'VEINTI' + Unidades(unidad);
    	                }
    	            case 3: return DecenasY('TREINTA', unidad);
    	            case 4: return DecenasY('CUARENTA', unidad);
    	            case 5: return DecenasY('CINCUENTA', unidad);
    	            case 6: return DecenasY('SESENTA', unidad);
    	            case 7: return DecenasY('SETENTA', unidad);
    	            case 8: return DecenasY('OCHENTA', unidad);
    	            case 9: return DecenasY('NOVENTA', unidad);
    	            case 0: return Unidades(unidad);
    	        }
    	    }//Unidades()

    	    function DecenasY(strSin, numUnidades) {
    	        if (numUnidades > 0)
    	            return strSin + ' Y ' + Unidades(numUnidades)

    	        return strSin;
    	    }//DecenasY()

    	    function Centenas(num) {
    	        let centenas = Math.floor(num / 100);
    	        let decenas = num - (centenas * 100);

    	        switch(centenas)
    	        {
    	            case 1:
    	                if (decenas > 0)
    	                    return 'CIENTO ' + Decenas(decenas);
    	                return 'CIEN';
    	            case 2: return 'DOSCIENTOS ' + Decenas(decenas);
    	            case 3: return 'TRESCIENTOS ' + Decenas(decenas);
    	            case 4: return 'CUATROCIENTOS ' + Decenas(decenas);
    	            case 5: return 'QUINIENTOS ' + Decenas(decenas);
    	            case 6: return 'SEISCIENTOS ' + Decenas(decenas);
    	            case 7: return 'SETECIENTOS ' + Decenas(decenas);
    	            case 8: return 'OCHOCIENTOS ' + Decenas(decenas);
    	            case 9: return 'NOVECIENTOS ' + Decenas(decenas);
    	        }

    	        return Decenas(decenas);
    	    }//Centenas()

    	    function Seccion(num, divisor, strSingular, strPlural) {
    	        let cientos = Math.floor(num / divisor)
    	        let resto = num - (cientos * divisor)

    	        let letras = '';

    	        if (cientos > 0)
    	            if (cientos > 1)
    	                letras = Centenas(cientos) + ' ' + strPlural;
    	            else
    	                letras = strSingular;

    	        if (resto > 0)
    	            letras += '';

    	        return letras;
    	    }//Seccion()

    	    function Miles(num) {
    	        let divisor = 1000;
    	        let cientos = Math.floor(num / divisor)
    	        let resto = num - (cientos * divisor)

    	        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
    	        let strCentenas = Centenas(resto);

    	        if(strMiles == '')
    	            return strCentenas;

    	        return strMiles + ' ' + strCentenas;
    	    }//Miles()

    	    function Millones(num) {
    	        let divisor = 1000000;
    	        let cientos = Math.floor(num / divisor)
    	        let resto = num - (cientos * divisor)

    	        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
    	        let strMiles = Miles(resto);

    	        if(strMillones == '')
    	            return strMiles;

    	        return strMillones + ' ' + strMiles;
    	    }//Millones()

    	    return function NumeroALetras(num, currency) {
    	        currency = currency || {};
    	        let data = {
    	            numero: num,
    	            enteros: Math.floor(num),
    	            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    	            letrasCentavos: '',
    	            letrasMonedaPlural: currency.plural || 'PESOS ',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
    	            letrasMonedaSingular: currency.singular || 'PESOS ', //'PESO', 'Dólar', 'Bolivar', 'etc'
    	            letrasMonedaCentavoPlural: currency.centPlural || 'CENTAVOS ',
    	            letrasMonedaCentavoSingular: currency.centSingular || 'CENTAVOS '
    	        };

    	        if (data.centavos > 0) {
    	            data.letrasCentavos = 'CON ' + (function () {
    	                    if (data.centavos == 1)
    	                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
    	                    else
    	                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
    	                })();
    	        };

    	        if(data.enteros == 0)
    	            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    	        if (data.enteros == 1)
    	            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
    	        else
    	            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    	    };

    	})();

    	// Modo de uso: 500,34 USD
    	numeroALetras(500.34, {
    	  plural: 'dólares estadounidenses',
    	  singular: 'dólar estadounidense',
    	  centPlural: 'centavos',
    	  centSingular: 'centavo'
    	});

    
    
    
    
    
});
