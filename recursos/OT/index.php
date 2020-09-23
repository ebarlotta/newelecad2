<html ng-app="datosApp">

<head>
   <title></title>
   <script type="text/javascript" src="../../bootstrap/angular.min.js"></script>
   <script type="text/javascript" src="OTController.js"> </script>
   <?php include "../scripts.php"; ?>
</head>

<body style="background-color:black;" ng-controller="OTController" ng-init="init();">

   <div class="container">
      <?php include "../navbar.php"; ?>
   </div>
   <div class="container page">
      <div class="row" style="display: flex;">
         <div class="column">
            <div ng-show="{{ Session('message') }}" class="alert alert-success jumbotron" style="margin: 20px;" id="successMessage" ng-model="success">
               {{ Session('message') }}
            </div>
            <li>
               <div ng-show="{{ Mensaje }}" class="alert alert-danger jumbotron" style="margin: 20px;">
                  {{ Mensaje }}
               </div>
            </li>
            <div style="width:100%;color: white;">
               <div class="container">
                  <div class="col" style="display: block;">
                     <a href="recursos/OT">
                        <div class="card" style="width: 800px;">
                           <h5 class="card-title">Ordenes cobradas</h5>
                           <div>
                              <li ng-repeat="orden in ordenes" style="list-style:none">
                                 {{ orden.OT_date  }} - {{ orden.client_name }} - {{ orden.OT_detail }} - {{ orden.Total }}
                              </li>
                              <h3> VENDIDO: {{ TotalGral }} </h3>
                           </div>
                           <div class="card-body"></div>
                        </div>
                     </a>
                     <a href="recursos/clients">
                        <div class="card" style="width: 800px;">
                           <h5 class="card-title">Ordenes en sin terminar</h5>
                           <div>
                              <li ng-repeat="ordenNC in ordenesNC" style="list-style:none">
                                 {{ ordenNC.OT_date  }} - {{ ordenNC.client_name }} - {{ ordenNC.OT_detail }} - {{ ordenNC.Total }}
                              </li>
                              <h3> TOTAL A COBRAR: {{ TotalGralNC }} </h3>
                           </div>
                           <div class="card-body"></div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>

</html>