<?php  
 //filter.php  
 if(isset($_POST["codper"], $_POST["from_date"], $_POST["to_date"]))  
 {  
      $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
      $connecttwo->set_charset("utf8");
      $output = '';  
      $sql = "  
           SELECT * FROM ordinthh  
           WHERE (responhh = '".$_POST["codper"]."')
           AND fechahh BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";  
      $resultone = mysqli_query($connecttwo, $sql);  
      $output .= '  
           <table class="table table-bordered" id="order_table-col">
              <thead>
                  <tr> 
                       <th>Código de orden</th>  
                       <th>Fecha de ingreso de horas</th>  
                       <th>Horas</th>  
                       <th>Minutos</th>  
                       <th>Tipo de trabajo</th>  
                       <th>Código de persona</th>  
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
                          <td>'. $row["fechahh"] .'</td>  
                          <td>'. $row["valhorah"] .'</td>  
                          <td>'. $row["valminh"] .'</td> 
                          <td>'. $row["tiptrahh"] .'</td> 
                          <td>'. $row["responhh"] .'</td>  
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
      $output .= '</table>';
      $output .= "<script type='text/javascript'>
      $(document).ready(function() {
                $('#order_table-col').tablesorter();
                });
            </script>";
      echo $output;  
 }  
 ?>
