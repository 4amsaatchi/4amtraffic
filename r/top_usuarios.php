<?php
   require_once '../config.php';
   //load_data_select.php
   $connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
   $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
   $connect->set_charset("utf8");
   $connecttwo->set_charset("utf8");

   $query = "SELECT * FROM 4am_comsysn.ageperso RIGHT JOIN 
              (SELECT 4am_traficon.ts_horas.coduser, 
                COUNT(DISTINCT 4am_traficon.ts_horas.codorden) AS orden, 
                COUNT( 4am_traficon.ts_horas.corre) AS core, 
                SUM( 4am_traficon.ts_horas.tothoras) AS horas, 4am_traficon.ts_horas.fecha 
                FROM 4am_traficon.ts_horas WHERE 4am_traficon.ts_horas.fecha BETWEEN '2019-01-01' AND '2019-05-01'  GROUP BY 4am_traficon.ts_horas.coduser) 
              tt_ts_horas ON 4am_comsysn.ageperso.codper = tt_ts_horas.coduser GROUP BY 4am_comsysn.ageperso.codper
      ORDER BY horas DESC
      LIMIT 10";
   $resultone = mysqli_query($connecttwo, $query);
   function fill_brand($connect) {
      $output = '';
      $sql = "SELECT * FROM climae LIMIT 150";
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result)) {
         $output .= '<option value="'.$row["codcli"].'">'.$row["nomcli"].'</option>';
      }
         return $output;
   }
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
   <title>Top 10 Usuarios con más horas por ordenes</title>
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
   span.select2.select2-container {
   width: 100% !important;
   }
   </style>
   </head>

   <body class="">
      <div class="wrapper ">
         <div class="sidebar" data-color="rose" data-background-color="black" data-image="/assets/img/sidebar-5.jpg">
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
                  <li class="nav-item  ">
                     <a class="nav-link" href="/r/dashboard.php"><i class="material-icons">dashboard</i><p>Dashboard</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/reporte_usuarios.php"><i class="material-icons">person</i><p>Reporte de Usuarios</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/r/reporte_clientes.php"><i class="material-icons">content_paste</i><p>Reporte de Clientes</p></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/r/top_clientes.php"><i class="material-icons">group</i><p>Top 10 Clientes</p></a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link" href="#"><i class="material-icons">person_add</i><p>Top 10 Usuarios</p></a>
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
                        <div class="row">
                           <div class="col-md-12">
                              <h3 style="text-align: center;">Top 10 Usuarios con más horas y su total de ordenes</h3>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12"><h4 style="text-align: center;">Seleciona rango de fechas:</h4></div>
                        </div>
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
                        <div class="row">
                           <div class="col-md-9"></div>
                           <div class="col-md-3">
                              <input type="button" onclick="Exportar()" value="Exportar a Excel"  class="btn btn-info exportarbtn">
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div id="order_table" class="panel panel-default row">  
                                 <table class="table" id="order_table-col">
                                    <thead class=" text-primary">
                                       <tr>  
                                       <th>Usuario</th>  
                                       <th>Ordenes</th>  
                                       <th>Anexo</th>  
                                       <th>Horas en total</th>  
                                       </tr>  
                                    </thead>
                                    <tbody>  
                                       <?php  
                                          while($row = mysqli_fetch_array($resultone)){  
                                       ?>  
                                          <tr>  
                                             <td><?php echo $row["nomper"]; ?></td>  
                                             <td><?php echo $row["orden"]; ?></td>  
                                             <td><?php echo $row["core"]; ?></td>  
                                             <td><?php echo $row["horas"]; ?></td>
                                          </tr>
                                       <?php  
                                          }  
                                       ?>
                                    </tbody>
                                 </table>  
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
   $(document).ready(function() {
      $('#order_table-col').tablesorter();
   });
</script>
<script>
   function Exportar(){
      var uri = 'data:application/vnd.ms-excel;base64,'
      , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }

      var table = 'order_table-col';
      var name = 'top_usuarios';

      if (!table.nodeType) table = document.getElementById(table)
      var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      //window.location.href = uri + base64(format(template, ctx))
      var link = document.createElement("a");
      link.download = "Top 10 usuarios con más horas.xls";
      link.href = uri + base64(format(template, ctx));
      link.click();
   }
</script>

<script>
$(function() {
     $('#from_date').datepicker(
                    {
                        dateFormat: "yy-mm-dd",
                        changeDay: false,
                        changeMonth: true,
                        changeYear: true,
                        showButtonPanel: true,
                        onClose: function(dateText, inst) {


                            function isDonePressed(){
                                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                            }

                            if (isDonePressed()){
                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                                
                                 $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
                            }
                        },
                        beforeShow : function(input, inst) {

                            inst.dpDiv.addClass('month_year_datepicker')

                            if ((datestr = $(this).val()).length > 0) {
                                year = datestr.substring(datestr.length-4, datestr.length);
                                month = datestr.substring(0, 2);
                                $(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
                                $(this).datepicker('setDate', new Date(year, month-1, 1));
                                $(".ui-datepicker-calendar").hide();
                            }
                        }
                    })
});
$(function() {
     $('#to_date').datepicker(
                    {
                        dateFormat: "yy-mm-dd",
                        changeDay: false,
                        changeMonth: true,
                        changeYear: true,
                        showButtonPanel: true,
                        onClose: function(dateText, inst) {


                            function isDonePressed(){
                                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                            }

                            if (isDonePressed()){
                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                                
                                 $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
                            }
                        },
                        beforeShow : function(input, inst) {

                            inst.dpDiv.addClass('month_year_datepicker')

                            if ((datestr = $(this).val()).length > 0) {
                                year = datestr.substring(datestr.length-4, datestr.length);
                                month = datestr.substring(0, 2);
                                $(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
                                $(this).datepicker('setDate', new Date(year, month-1, 1));
                                $(".ui-datepicker-calendar").hide();
                            }
                        }
                    })
});
</script>
<script>
         $('#filter').click(function(){
        //console.log(codempresa);
        //console.log(susuarios);
        from_date = $('#from_date').val();
        to_date = $('#to_date').val();
        //codper = $('#usuario').val();
        //codcli = $('#show_customers').val();
        console.log(from_date);
        console.log(to_date);



        if(from_date != '' && to_date != '')  {
             $.ajax({  
                  url:"/top_user_data.php",  
                  method:"POST",  
                  data:{from_date:from_date, to_date:to_date},
                  beforeSend: function() {
                    $('#datos_consulta').css('background', 'url(/img/ajaxloader.gif) no-repeat center top')
                  },
                  complete: function(){
                    $('#order_table').css('background', 'none')
                  },
                  success:function(data)  
                  {  
                    $('#order_table').html(data);
                  }  
             });  
        } else{  
             alert("Selecione agencia, usuario y rango de fechas");  
        }  
     });
</script>