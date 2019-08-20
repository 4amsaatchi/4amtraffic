<?php

$usuarios =!empty ($_POST["usuarios"]) ? $_POST["usuarios"] : NULL;
$agencia     =!empty ($_POST["agencia"])     ? $_POST["agencia"]     : NULL;
$connecttwo = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
$connecttwo->set_charset("utf8");
$output = '';


if(isset($_POST["usuarios"], $_POST["agencia"])){  
    if ($_POST["usuarios"] != '' && $_POST["agencia"] != '') {
        $sql  = "SELECT DISTINCT agepersocli.*, climae.nomcli, ageperso.nomper, ageperso.activoper
            FROM ageperso
                INNER JOIN agepersocli ON ageperso.codper = agepersocli.codper
                INNER JOIN climae ON agepersocli.codcli = climae.codcli
            WHERE agepersocli.codagencia IN ($agencia) AND agepersocli.codper IN ($usuarios) AND ageperso.activoper = 'Activo'
            GROUP BY agepersocli.codcli;";
    } else {
        $sql = "SELECT * FROM agepersocli";
    }
    $result = mysqli_query($connecttwo, $sql);  
        while($row = mysqli_fetch_array($result))  
    {   
    $output .= '<option value="'.$row["codcli"].'">'.$row["nomcli"].'</option>';  
    }  
    echo $output;
}
 ?>