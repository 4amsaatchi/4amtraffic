<?php
      //connect database

      $connecttwo = msql_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
      $connecttwo->set_charset("utf8");

   //validation if send var with data (codcli, date, date2)
   if(isset($_POST["codcli"], $_POST["from_date"], $_POST["to_date"])) {

      //Display Content in html tabs if content full

      $output = '';
      if (isset($_POST["codcli"])) {
         if ($_POST["codcli"] != '') {
            $sql = "
               SELECT * FROM ordint
               WHERE codcli = '".$_POST["codcli"]."'
               BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
               ORDER BY f_aprueba DESC
               LIMIT 150 OFFSET 2
            ";
         }
      }
   }
?>
