<?php

$usuarios =!empty ($_POST["usuarios"]) ? $_POST["usuarios"] : NULL;
//$codper     =!empty ($_POST["codper"])     ? $_POST["codper"]     : NULL;
$connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
$connecttwo->set_charset("utf8");
$output = '';


if(isset($_POST["usuarios"])){  
    if ($_POST["usuarios"] != '') {
        $sql  = "SELECT DISTINCT agepersocli.*, climae.nomcli, ageperso.nomper, ageperso.activoper
            FROM ageperso
                INNER JOIN agepersocli ON ageperso.codper = agepersocli.codper
                INNER JOIN climae ON agepersocli.codcli = climae.codcli
            WHERE agepersocli.codper IN ($usuarios)
            GROUP BY agepersocli.codagencia;";
    } else {
        $sql = "SELECT * FROM agepersocli";
    }
    $result = mysqli_query($connecttwo, $sql);  
        while($row = mysqli_fetch_array($result))  
    {  
    $output .= '<option value="'.$row["codagencia"].'">'.$row["codagencia"].'</option>';  
    }  
    echo $output;
 }  
 ?>