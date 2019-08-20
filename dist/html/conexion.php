<?php  
 $conn = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");  
 $output = array();  
 $query = "SELECT * FROM climae";  
 $result = mysqli_query($conn, $query);  
 if(mysqli_num_rows($result) > 0) {  
      while($row = mysqli_fetch_array($result)) {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
?>  