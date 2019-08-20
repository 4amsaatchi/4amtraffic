<?php

$fromDate  =!empty ($_POST["from_date"])  ? $_POST["from_date"]  : NULL;
$toDate    =!empty ($_POST["to_date"])    ? $_POST["to_date"]    : NULL;


 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi");
      $connecttwo->set_charset("utf8");
      $output = '';  
      $sql  = "SELECT * FROM 4am_comsysn.ageperso RIGHT JOIN 
              (SELECT 4am_traficon.ts_horas.coduser, 
                COUNT(DISTINCT 4am_traficon.ts_horas.codorden) AS orden, 
                COUNT( 4am_traficon.ts_horas.corre) AS core, 
                SUM( 4am_traficon.ts_horas.tothoras) AS horas, 4am_traficon.ts_horas.fecha 
                FROM 4am_traficon.ts_horas WHERE 4am_traficon.ts_horas.fecha BETWEEN '$fromDate' AND '$toDate'  GROUP BY 4am_traficon.ts_horas.coduser) 
              tt_ts_horas ON 4am_comsysn.ageperso.codper = tt_ts_horas.coduser GROUP BY 4am_comsysn.ageperso.codper
      ORDER BY horas DESC
      LIMIT 10";

      $resultone = mysqli_query($connecttwo, $sql);  
      $output .= '
           <table class="table" id="order_table-col">
              <thead class="text-primary">
                  <tr> 
                       <th class="click-order">Usuario</th>
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
                          <td>'. $row["nomper"] .'</td> 
                          <td>'. $row["orden"] .'</td>
                          <td>'. $row["core"] .'</td> 
                          <td>'. $row["horas"] .'</td>
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
