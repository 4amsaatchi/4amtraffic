<?php   
 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
 $connect -> set_charset("utf8");
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM agesuc";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["codagencia"].'">'.$row["codagencia"].'</option>';  
      }  
      return $output;  
 }  
 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM agesuc";  
      $result = mysqli_query($connect, $sql);  
      $output .= '<option value="">Selecione Usuario</option>';
      return $output;  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Change</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
      </head>  
      <body style="background: black;">  
           <br /><br />  
           <div class="container">  
                <h3>  
                     <select name="brand" id="brand">  
                          <option value="">seleccione usuario</option>  
                          <?php echo fill_brand($connect); ?>  
                     </select>  
                     <br /><br />  
                     <select class="row" id="show_product">  
                          <?php echo fill_product($connect);?>  
                     </select>
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                     <br>
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                     <br>
                     <input style="width: 100%;" type="button" name="filter" id="filter" value="Filtrar" class="btn btn-info" /> 
                     <div id="order_table" class="panel panel-default row">  
                    <table class="table table-bordered" id="order_table-col">
                      <thead>
                        <tr>  
                             <th>Código de orden</th>  
                             <th>Trabajo</th>  
                             <th>Responsable</th>  
                             <th>Código de agencia</th>  
                             <th>Horas</th>
                        </tr>  
                      </thead>
                      <tbody>  
                    <?php  
                    while($row = mysqli_fetch_array($resultone))  
                    {  
                    ?>  
                          <tr>  
                               <td><?php echo $row["codordint"]; ?></td>  
                               <td><?php echo $row["obshh"]; ?></td>  
                               <td><?php echo $row["nomper"]; ?></td>  
                               <td><?php echo $row["codagencia"]; ?></td>  
                               <td><?php echo $row["horash"]; ?></td>
                          </tr>  
                    <?php  
                    }  
                    ?>  
                        </tbody>
                    </table> 
                </h3>  
           </div>  
      </body>  
 </html>
 <script>
  $(document).ready(function() {
    $('#customers').select2();
    $('#order_table').tablesorter();
  });
</script>
 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var codagencia = $(this).val();  
           $.ajax({  
                url:"ajaxData.php",  
                method:"POST",  
                data:{codagencia:codagencia},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>
 <script>  
 $(document).ready(function(){
             $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker({maxDate: '0'});
                $("#to_date").datepicker({maxDate: '0'}); 
           });
      /*$('#customers').change(function(){  
          codcli = $(this).val();  
           $.ajax({  
                url:"load_data.php",
                method:"POST",  
                data:{codcli:codcli},
                beforeSend: function() {
                   $('#show_ordint').css('background', 'url(/img/ajaxloader.gif) no-repeat center top')
                },
                complete: function(){
                   $('#show_ordint').css('background', 'none')
                },
                success:function(data){  
                     $('#show_ordint').html(data);  
                }

           });
      });*/
      $('#filter').click(function(){  
        from_date = $('#from_date').val();
        to_date = $('#to_date').val();
        codagencia = $('#brand').val();
        codper = $('#show_product').val();
        //console.log(codcli, from_date, to_date);
        if(codagencia != "" && codper != "" && from_date != '' && to_date != '')  {  
             $.ajax({  
                  url:"user_data.php",  
                  method:"POST",  
                  data:{codagencia:codagencia, codper:codper, from_date:from_date, to_date:to_date},
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
        } else{  
             alert("Selecione agencia, usuario y rango de fechas");  
        }  
     });
 });  
 </script>