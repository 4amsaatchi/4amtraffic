<?php

$fromDate  =!empty ($_POST["from_date"])  ? $_POST["from_date"]  : NULL;
$toDate    =!empty ($_POST["to_date"])    ? $_POST["to_date"]    : NULL;


 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi");
      $connecttwo->set_charset("utf8");
      $output = '';  
      $sql  = "SELECT 4am_comsysn.climae.nomcli, 4am_traficon.ts_horas.fecHa, 4am_traficon.ts_horas.codclt, 
      COUNT(DISTINCT 4am_traficon.ts_horas.codorden) AS orden,
      COUNT(4am_traficon.ts_horas.corre) AS num_correlativo,
      SUM(4am_traficon.ts_horas.tothoras) AS total_horas 
      FROM 4am_comsysn.climae 
         INNER JOIN 4am_traficon.ts_horas ON 4am_comsysn.climae.codcli = 4am_traficon.ts_horas.codclt 
      WHERE 4am_traficon.ts_horas.fecha BETWEEN '$fromDate' AND '$toDate'
      GROUP BY 4am_traficon.ts_horas.codclt 
      ORDER BY total_horas DESC 
      LIMIT 10";

      $resultone = mysqli_query($connecttwo, $sql);  
      $output .= '
           <table class="table" id="order_table-col">
              <thead class="text-primary">
                  <tr> 
                       <th class="click-order">Cliente</th>
                       <th class="click-order">Ordenes</th>  
                       <th class="click-order">Anexo</th>  
                       <th class="click-order">Horas en total</th>
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
                          <td>'. $row["nomcli"] .'</td> 
                          <td>'. $row["orden"] .'</td>
                          <td>'. $row["num_correlativo"] .'</td> 
                          <td>'. $row["total_horas"] .'</td>  
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
      $output .= '
				</table>
			</div>
		</div>
      ';
      $output .= "<script type='text/javascript'>
      $(document).ready(function() {
                $('#order_table-col').tablesorter();
                });
            </script>";
      echo $output;  
 }  
 ?>
