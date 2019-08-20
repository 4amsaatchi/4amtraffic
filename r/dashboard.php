<?php
   require_once '../config.php';
   if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
      // user already logged in the site
      header("location:" . SITE_URL);
   }
?>
<!DOCTYPE html>
<html lang="es">
   <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="https://4amsaatchi.com/wp-content/uploads/2018/04/cropped-favicon-saatchi-1.png">
   <link rel="icon" type="image/png" href="https://4amsaatchi.com/wp-content/uploads/2018/04/cropped-favicon-saatchi-1.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Dashboard</title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- CSS Files -->
   <link href="/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
   <!-- CSS Just for demo purpose, don't include it in your project -->
   <link href="/assets/demo/demo.css" rel="stylesheet" />
   <link rel="stylesheet" href="/assets/css/init-material-dashboard.min.css">
   <style> 
      .card-title{
         font-size: 1.3rem !important;
      }
   </style>
   </head>

   <body class="sidebar-mini">
      <div class="wrapper ">
         <div class="sidebar" data-color="rose" data-background-color="black" data-image="/assets/img/sidebar-1.jpg">
            <div class="logo">
               <a href="/" class="simple-text logo-normal">4am Traffic</a>
            </div>
            <div class="sidebar-wrapper">
               <div class="user">
                  <div class="photo">
                     <img src="<?php echo $_SESSION['picture']; ?>">
                  </div>
                  <div class="user-info">
                     <a data-toggle="collapse" href="#collapseExample" class="username">
                     <span><?php echo $_SESSION["name"] ?><b class="caret"></b></span></a>
                     <div class="collapse" id="collapseExample">
                        <ul class="nav">
                           <li class="nav-item">
                              <a class="nav-link" href="#">
                                 <span class="sidebar-mini"> <i class="material-icons">exit_to_app</i> </span>
                                 <span class="sidebar-normal" onclick="window.location='/../logout.php'"> Cerrar Sesión </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <ul class="nav">
                  <li class="nav-item  active">
                     <a class="nav-link" href="/r/dashboard.php"><i class="material-icons">dashboard</i><p>Dashboard</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/reporte_usuarios.php"><i class="material-icons">person</i><p>Reporte de Usuarios</p></a>
                  </li> 
                  <!-- <li class="nav-item">
                     <a class="nav-link" href="/r/e/consolidado_cliente.php"><i class="material-icons">person</i><p>Consolidado por cliente</p></a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link" href="/r/reporte_clientes.php"><i class="material-icons">content_paste</i><p>Reporte de Clientes</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/r/top_clientes.php"><i class="material-icons">group</i><p>Top 10 Clientes</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/r/top_usuarios.php"><i class="material-icons">person_add</i><p>Top 10 Usuarios</p></a>
                  </li>
                  <!-- <li class="nav-item active-pro ">
                  <a class="nav-link" href="logout.php"><i class="material-icons">unarchive</i><p>Cerrar Sesión</p></a>
                  </li> -->
               </ul>
            </div>
         </div>
         <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
               <div class="container-fluid">
                  <div class="navbar-wrapper">
                     <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                           <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                           <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                           <div class="ripple-container"></div>
                        </button>
                     </div>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="navbar-toggler-icon icon-bar"></span>
                     <span class="navbar-toggler-icon icon-bar"></span>
                     <span class="navbar-toggler-icon icon-bar"></span>
                  </button>
               </div>
            </nav>
            <div class="nada">
               <div class="nada">
                  <div class="page-header pricing-page header-filter" style="background-image: url('/assets/img/dash.jpg'); padding: 0 !important;">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-7 ml-auto mr-auto text-center">
                                 <h3 class="title">Seleccione el reporte que desea realizar</h2>
                              </div>
                           </div>
                           <div class="row" style="padding-left: 30px; padding-right: 30px;">
                              <div class="col-lg-3 col-md-6" style="padding-left: 0 !important; padding-right: 0 !important;">
                                 <div id="reporte_usuarios" class="card card-pricing">
                                    <!-- <h6 class="card-category">Reporte de Usuarios</h6> -->
                                    <div class="card-body">
                                       <div class="card-icon icon-rose">
                                          <i class="material-icons">person</i>
                                       </div>
                                       <h3 class="card-title">Reporte de Usuarios</h3>
                                       <!-- <p class="card-description">This is good if your company size is between 2 and 10 Persons.</p> -->
                                    </div>
                                    <div class="card-footer justify-content-center ">
                                       <a href="/reporte_usuarios.php" class="btn btn-round btn-rose">Crear Reporte</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6" style="padding-left: 0 !important; padding-right: 0 !important;">
                                 <div id="reporte_clientes" class="card card-pricing card-plain">
                                    <!-- <h6 class="card-category"> Small Company</h6> -->
                                    <div class="card-body">
                                       <div class="card-icon icon-rose">
                                          <i class="material-icons">content_paste</i>
                                       </div>
                                       <h3 class="card-title">Reporte de Clientes</h3>
                                       <!-- <p class="card-description">This is good if your company size is between 2 and 10 Persons.</p> -->
                                    </div>
                                    <div class="card-footer justify-content-center ">
                                       <a href="/r/reporte_clientes.php" class="btn btn-round btn-rose">Crear Reporte</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6" style="padding-left: 0 !important; padding-right: 0 !important;">
                                 <div id="top_clientes" class="card card-pricing card-plain">
                                    <!-- <h6 class="card-category"> Medium Company</h6> -->
                                    <div class="card-body">
                                       <div class="card-icon icon-rose">
                                          <i class="material-icons">group</i>
                                       </div>
                                       <h3 class="card-title">Top 10 Clientes</h3>
                                       <!-- <p class="card-description">This is good if your company size is between 11 and 99 Persons.</p> -->
                                    </div>
                                    <div class="card-footer justify-content-center ">
                                       <a href="/r/top_clientes.php" class="btn btn-round btn-rose">Crear Reporte</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6" style="padding-left: 0 !important; padding-right: 0 !important;">
                                 <div id="top_usuarios" class="card card-pricing card-plain">
                                    <!-- <h6 class="card-category"> Extra Pack</h6> -->
                                    <div class="card-body">
                                       <div class="card-icon icon-rose">
                                          <i class="material-icons">person_add</i>
                                       </div>
                                       <h3 class="card-title">Top 10 Usuarios</h3>
                                       <!-- <p class="card-description">This is good if your company size is 99+ Persons.</p> -->
                                    </div>
                                    <div class="card-footer justify-content-center ">
                                       <a href="/r/top_usuarios.php" class="btn btn-round btn-rose">Crear Reporte</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!--   Core JS Files   -->
      <script src="/assets/js/core/jquery.min.js"></script>
      <script src="/assets/js/core/popper.min.js"></script>
      <script src="/assets/js/core/bootstrap-material-design.min.js"></script>
      <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="/assets/js/material-dashboard.js" type="text/javascript"></script>

      <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
   </body>
</html>
<script>
   $(document).ready(function(){
      $("#reporte_clientes").hover(function(){
         $(this).toggleClass("card-plain");
         $('#reporte_usuarios').toggleClass("card-plain");
      });
      $("#top_clientes").hover(function(){
         $(this).toggleClass("card-plain");
         $('#reporte_usuarios').toggleClass("card-plain");
      });
      $("#top_usuarios").hover(function(){
         $(this).toggleClass("card-plain");
         $('#reporte_usuarios').toggleClass("card-plain");
      });
   });
</script>

