<?php
   require_once './config.php';
   if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
   // user already logged in the site
   header("location:".SITE_URL . "reporte_usuarios.php");
   } else{
      session_start();
      // although 2nd and 3rd line is not needed session_destroy() is needed,
      // but just to be extra sure that no session remains in the cache.
      $_SESSION = array();
      unset($_SESSION);
      session_destroy();
   }
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="https://4amsaatchi.com/wp-content/uploads/2018/04/cropped-favicon-saatchi-1.png">
      <link rel="icon" type="image/png" href="https://4amsaatchi.com/wp-content/uploads/2018/04/cropped-favicon-saatchi-1.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
      <title>Reporte de Usuarios</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      <!-- CSS Files -->
      <link href="/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
      <link href="/assets/demo/demo.css" rel="stylesheet" />
      <link rel="stylesheet" href="/assets/css/style.css">
      <link rel="stylesheet" href="/assets/css/init-material-dashboard.min.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
         <div class="container">
         <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><img src="/assets/img/logo.png" alt="" style="width: 18%;"></a>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
         <span class="sr-only">Toggle navigation</span>
         <span class="navbar-toggler-icon icon-bar"></span>
         <span class="navbar-toggler-icon icon-bar"></span>
         <span class="navbar-toggler-icon icon-bar"></span>
         </button>
            <div class="collapse navbar-collapse justify-content-end">
            </div>
         </div>
      </nav>
      <div class="wrapper wrapper-full-page">
         <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('../../assets/img/login.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                     <form class="form" method="" action="">
                        <div class="card card-login">
                           <div class="card-header card-header-rose text-center">
                              <h4 class="card-title">Login 4am Traffic</h4>
                              <div class="social-line">
                              </div>
                           </div>
                           <div class="card-body ">
                              <span class="bmd-form-group">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="material-icons">email</i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email...">
                                 </div>
                              </span>
                              <span class="bmd-form-group">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Contraseña...">
                                 </div>
                              </span>
                              <div class="card-footer justify-content-center">
                                 <a href="#" class="btn btn-rose btn-link btn-lg">Iniciar Sesión</a>
                              </div>
                              <div>
                                 <div style="float:left; width: 44%;"><hr/></div>
                                 <div style="float:right; width: 44%;"><hr/></div>
                                 <div style="text-align: center;width: 12%;display: inline-block;padding-top: 5px;"> O </div>
                              </div>
                           </div>
                           <!-- <p class="card-description text-center">Inicia sesión con Google</p> -->
                           <p>
                              <div class="col-sm-12 col-sm-offset-4">
                                 <a class="btn btn-github btn-block btn-primary" href="google_login.php" style="text-transform: initial; font-size: 14px; font-weight: 500;">
                                    <div class="left" style="display: inline-block;">
                                       <img width="20px" alt="Google &quot;G&quot; Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
                                    </div>
                                    &nbsp;Inicia sesión con Google
                                 </a>
                              </div>
                           </p>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <footer class="footer">
               <div class="container">
               <nav class="float-left"></nav>
               <div class="copyright float-right">
               <script>
               document.write(new Date().getFullYear())
               </script> Hecho con <i class="material-icons">favorite</i> por
               <a href="https://4amsaatchi.com" target="_blank">4am Saatchi & Saatchi</a>
               </div>
               </div>
            </footer>
         </div>
      </div>
      <!--   Core JS Files   -->
      <script src="/assets/js/core/jquery.min.js"></script>
      <script src="/assets/js/core/popper.min.js"></script>
      <script src="/assets/js/core/bootstrap-material-design.min.js"></script>
      <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="/assets/js/material-dashboard.js" type="text/javascript"></script>
      <!-- Material Dashboard DEMO methods, don't include it in your project! -->
      <script src="/assets/demo/demo.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   </body>
</html>
<?php
// unset if after it display the error.
$_SESSION["e_msg"] = "";
?>