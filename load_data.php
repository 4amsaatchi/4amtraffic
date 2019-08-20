<?php  
 //filter.php  
 if(isset($_POST["codcli"], $_POST["from_date"], $_POST["to_date"]))  
 {  
      $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
      $connecttwo->set_charset("utf8");
      $output = '';  
      $sql = "  
           SELECT *, DATEDIFF(f_entrega, f_ingreso) AS days_ejec, DATEDIFF(f_entrega, f_promete) AS days_atraso
           FROM ordint  
           WHERE (codcli = '".$_POST["codcli"]."')
           AND f_aprueba BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";  
      $resultone = mysqli_query($connecttwo, $sql);  
      $output .= '
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
                       <th>Código de orden</th>  
                       <th>Trabajo</th>  
                       <th>Fecha de ingreso</th>  
                       <th>Fecha de entrega Real</th>
                       <th>Días de ejecución</th>
                       <th>Fecha de entrega</th>
                       <th>Días de atraso</th>
                       <th>Código de orden</th>  
                  </tr>
              </thead>
      ';
      $output .= '<tbody>';
      if(mysqli_num_rows($resultone) > 0)  
      {  
           while($row = mysqli_fetch_array($resultone))  
           {  
                $output .= '
                   
                     <tr>
                          <td>'. $row["codordint"] .'</td>  
                          <td>'. $row["trabajo"] .'</td>  
                          <td>'. $row["f_ingreso"] .'</td>  
                          <td>'. $row["f_entrega"] .'</td>
                          <td>'. $row["days_ejec"] .'</td>
                          <td>'. $row["f_solicita"] .'</td> 
                          <td>'. $row["days_atraso"] .'</td> 
                          <td>'. $row["codstat"] .'</td>  
                     </tr>
                      
                ';  
           }  
      }
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="6">No se encontraron ordenes de trabajo</td>  
                </tr>  
           ';  
      }
      $output .= '</tbody>';
      $output .= '</table>
                </div>
              </div>
            </div>';
      $output .= "<script type='text/javascript'>
      $(document).ready(function() {
                $('#order_table-col').tablesorter();
                });
            </script>";
      echo $output;  
 }  
 ?>
