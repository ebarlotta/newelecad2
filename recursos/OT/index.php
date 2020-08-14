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
                  <div class="row" style="display: flex;">
                     <a href="recursos/OT">
                        <div class="card">
                           <div>
                              <img src="assets/kate-trysh-Dnkr_lmdKi8-unsplash.jpg" alt="" style="width:100%; height:100px">
                           </div>
                           <h5 class="card-title">Ordenes en curso</h5>
                           <div class="card-body"></div>
                        </div>
                     </a>
                     <a href="recursos/clients">
                        <div class="card">
                           <div>
                              <img src="assets/clients.jpg" alt="" style="width:100%; height:100px">
                           </div>
                           <h5 class="card-title">Ordenes Pendientes</h5>
                           <div class="card-body"></div>
                        </div>
                     </a>
                     <a href="recursos/products">
                        <div class="card">
                           <div>
                              <img src="assets/products.jpg" alt="" style="width:100%; height:100px">
                           </div>
                           <h5 class="card-title">Ordenes Terminadas</h5>
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