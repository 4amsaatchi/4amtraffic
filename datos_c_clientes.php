<?php

$fromDate  =!empty ($_POST["from_date"])  ? $_POST["from_date"]  : NULL;
$toDate    =!empty ($_POST["to_date"])    ? $_POST["to_date"]    : NULL;


 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi");
      $connecttwo->set_charset("utf8");
      $output = '';  
      $sql  = "SELECT DISTINCT 4am_traficon.ts_horas.*, 4am_comsysn.climae.nomcli, 4am_comsysn.ageperso.nomper 
      FROM 4am_traficon.ts_horas 
          INNER JOIN 4am_comsysn.ageperso ON 4am_traficon.ts_horas.coduser = 4am_comsysn.ageperso.codper
          INNER JOIN 4am_comsysn.climae ON 4am_traficon.ts_horas.codclt = 4am_comsysn.climae.codcli
      WHERE 4am_traficon.ts_horas.fecha BETWEEN '$fromDate' AND '$toDate'
      ORDER BY 4am_traficon.ts_horas.fecha DESC";

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
<div class="table row" style="margin: 0 !important;">
	<div class="col-md-8"></div>
	<div class="col-md-4">
		<div style="text-align: right; font-weight: 500; color: #000;">Total: <span id="resultado" style="color: #9c27b0;"></span></div>
	</div>
</div>
           <table class="table" id="order_table-col">
              <thead class="text-primary">
                  <tr> 
                       <th class="click-order">Agencia</th>
                       <th class="click-order">Cliente</th>  
                       <th class="click-order">Responsable</th>  
                       <th class="click-order">Código de orden</th>  
                       <th class="click-order">Fecha</th>  
                       <th class="click-order">Horas</th>
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
                          <td>'. $row["codempresa"] .'</td> 
                          <td>'. $row["nomcli"] .'</td>
                          <td>'. $row["nomper"] .'</td> 
                          <td>'. $row["codorden"] .'</td>  
                          <td>'. $row["fecha"] .'</td>  
                          <td class="total">'. $row["tothoras"] .'</td>  
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
      $output .= '<tfoot>
                    <tr>
                      <td colspan=5>Total de Horas</td>
                      <td id="contenido" class="text-primary"></td>
                    </tr>
                  </tfoot>';
      $output .= '
				</table>
			</div>
		</div>
      ';
      $output .= "<script type='text/javascript'>
      $(document).ready(function() {
                $('#order_table-col').tablesorter();
                var totalDeuda=0;
                $('.total').each(function(){
                  totalDeuda+=parseFloat($(this).html()) || 0;
                });
                console.log(totalDeuda);
                document.getElementById('contenido').innerHTML = totalDeuda.toFixed(2);
                document.getElementById('resultado').innerHTML = totalDeuda.toFixed(2);
                });
            </script>";
      echo $output;  
 }  
 ?>
