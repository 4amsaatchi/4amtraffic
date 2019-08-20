<?php  
 $connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
$connect->set_charset("utf8");
 $query = "SELECT * FROM ordint ORDER BY f_aprueba desc LIMIT 150";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Datos por fecha</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h2 align="center">Datos por rango de fecha</h2>
                <div class="col-md-5" style="padding: 0 !important;">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-2" style="padding: 0 !important;">  
                     <input style="width: 100%;" type="button" name="filter" id="filter" value="Filtrar" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table" class="panel panel-default">  
                     <table class="table">
                        <thead>
                          <tr>  
                               <th>#</th>  
                               <th>Trabajo</th>  
                               <th>Fecha de ingreso</th>  
                               <th>Fecha de entrega</th>  
                               <th>Fecha de entrega Real</th>  
                               <th>Código de orden</th>  
                          </tr>  
                        </thead>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  <tbody>
                            <tr>  
                                 <td><?php echo $row["codordint"]; ?></td>  
                                 <td><?php echo $row["trabajo"]; ?></td>  
                                 <td><?php echo $row["f_ingreso"]; ?></td>  
                                 <td><?php echo $row["f_solicita"]; ?></td>  
                                 <td>$ <?php echo $row["f_entrega"]; ?></td>  
                                 <td><?php echo $row["codstat"]; ?></td>  
                            </tr>  
                          </tbody>
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"up_calendar.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},
                          beforeSend: function() {
                            $('#order_table').css('background', 'url(/img/ajaxloader.gif) no-repeat center top')
                          },
                          complete: function(){
                            $('#order_table').css('background', 'none')
                          },
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Selecione Fecha");  
                }  
           });  
      });  
 </script>