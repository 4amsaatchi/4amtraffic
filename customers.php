<?php   
  //load_data_select.php  
  $connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
  $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
  $connect->set_charset("utf8");
  $connecttwo->set_charset("utf8");

  $query = "SELECT * FROM ordint ORDER BY f_aprueba desc LIMIT 150";  
  $resultone = mysqli_query($connecttwo, $query);
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM climae LIMIT 150";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["codcli"].'">'.$row["nomcli"].'</option>';  
      }  
      return $output;  
 }   
 ?>  
 <!DOCTYPE html>  
 <html>  
    <head>
        <!--This is what you should include--> 
        <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=utf-8">  
        <title>Merge Data of Customers with Ordint</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
        <style>
          select#customers {
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
            margin-top: 20px;
            border-radius: 4px;
            padding: 6px 12px;
            border: 1px solid #ccc;
            webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
          }
          span.select2.select2-container.select2-container--default {
              margin: 0 auto;
              display: block;
              width: 50% !important;
          }
        </style>
    </head>  
    <body>    
        <div class="container" style="padding-top: 40px;">
            <select name="customers" id="customers">  
                <option value="">Seleccione cliente</option>  
                <?php echo fill_brand($connect); ?>  
            </select>
            <div class="row">
                          <div class="col-md-5" style="padding: 0 !important;">  
              <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
            </div>  
            <div class="col-md-5">  
              <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
            </div>  
            <div class="col-md-2" style="padding: 0 !important;">  
             <input style="width: 100%;" type="button" name="filter" id="filter" value="Filtrar" class="btn btn-info" />  
            </div> 
            </div>
            <!-- <button onclick="exportTableToExcel('order_table-col', 'members-data')">Export Table Data To Excel File</button> -->
            <div id="order_table" class="panel panel-default row">  
               <table class="table table-bordered" id="order_table-col">
                  <thead>
                    <tr>  
                         <th>Código de orden</th>  
                         <th>Trabajo</th>  
                         <th>Fecha de ingreso</th>  
                         <th>Fecha de entrega</th>  
                         <th>Fecha de entrega Real</th>  
                         <th>Código de orden</th>  
                    </tr>  
                  </thead>
                  <tbody>  
               <?php  
               while($row = mysqli_fetch_array($resultone))  
               {  
               ?>  
                      <tr>  
                           <td><?php echo $row["codordint"]; ?></td>  
                           <td><?php echo $row["trabajo"]; ?></td>  
                           <td><?php echo $row["f_ingreso"]; ?></td>  
                           <td><?php echo $row["f_solicita"]; ?></td>  
                           <td><?php echo $row["f_entrega"]; ?></td>  
                           <td><?php echo $row["codstat"]; ?></td> 
                      </tr>  
               <?php  
               }  
               ?>  
                    </tbody>
               </table>  
          </div>
        </div>
        <script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/FileSaver.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/Blob.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/xls.core.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/dist/js/tableexport.js"></script>
    </body>  
 </html>
<script>
  $(document).ready(function() {
    $('#customers').select2();
    $('#order_table-col').tablesorter();
  });
</script>
<script>
$("#order_table-col").tableExport({formats: ["xlsx"]});
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
        codcli = $('#customers').val();
        //console.log(codcli, from_date, to_date);
        if(codcli != "" && from_date != '' && to_date != '')  {  
             $.ajax({  
                  url:"load_data.php",  
                  method:"POST",  
                  data:{codcli:codcli, from_date:from_date, to_date:to_date},
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
             alert("Selecione Fecha y Cliente");  
        }  
     });
 });  
 </script>
 <script>
   function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel' +  ';charset=utf-8';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
  }
 </script>