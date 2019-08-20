<?php
   require_once 'config.php';
   //load_data_select.php
   $connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
   $connect -> set_charset("utf8");
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
      <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
      <title>Consolidado por cliente</title>
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
      <div class="wrapper ">
         <div class="sidebar" data-color="rose" data-background-color="black" data-image="/assets/img/sidebar-5.jpg">
            <div class="logo">
            <a href="/" class="simple-text logo-normal">
            4am Traffic
            </a>
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
                                 <span class="sidebar-normal" onclick="window.location='logout.php'"> Cerrar Sesión </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <ul class="nav">
                  <li class="nav-item  ">
                     <a class="nav-link" href="/r/dashboard.php"><i class="material-icons">dashboard</i><p>Dashboard</p></a>
                  </li>
                  <!-- <li class="nav-item active">
                     <a class="nav-link" href="#"><i class="material-icons">person</i><p>Reporte de Usuarios</p></a>
                  </li> -->
                  <li class="nav-item active">
                     <a class="nav-link" href="#"><i class="material-icons">person</i><p>Consolidado por cliente</p></a>
                  </li>
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
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 style="text-align: center;">Seleccione el rango de fechas para visualizar su reporte:</h3>
                        <br>
                        <br>
                        <div class="row">
                           <div class="col-md-3"></div>
                           <div class="col-md-3">
                              <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Desde" />
                           </div>
                           <div class="col-md-3">
                              <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Hasta" />
                           </div>
                           <br>
                           <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                           <div class="col-md-4"></div>
                           <div class="col-md-4"><br><input style="width: 100%;" type="button" name="filter" id="filter" value="GENERAR" class="btn btn-info" /></div>
                           <div class="col-md-4"></div>
                        </div>
                     </div>
                     <br>
                     <div class="col-md-12" id="datos_consulta"></div>
                  </div>
               </div>
            </div>
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
      <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
   </body>
</html>
 <script>  
 $(document).ready(function(){
      $.datepicker.setDefaults({  
        dateFormat: 'yy-mm-dd'   
      });  
      $(function(){  
        $("#from_date").datepicker({maxDate: '0'});
        $("#to_date").datepicker({maxDate: '0'}); 
      });

      $('#filter').click(function(){
        //console.log(codempresa);
        //console.log(susuarios);
        from_date = $('#from_date').val();
        to_date = $('#to_date').val();
        //codper = $('#usuario').val();
        //codcli = $('#show_customers').val();

        if(from_date != '' && to_date != '')  {
             $.ajax({  
                  url:"datos_c_clientes.php",  
                  method:"POST",  
                  data:{from_date:from_date, to_date:to_date},
                  complete: function(){
                    $('#order_table').css('background', 'none')
                  },
                  success:function(data)  
                  {  
                    $('#datos_consulta').html(data);
                  }  
             });  
        } else{  
             alert("Selecciona un rango de fechas");  
        }  
     });
 });  
 </script>

 <script>
 function Exportar(){
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }

        var table = 'order_table-col';
        var name = 'Usuaios';

        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        //window.location.href = uri + base64(format(template, ctx))
        var link = document.createElement("a");
        link.download = "Reporte de Usuarios.xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
}
 </script>
