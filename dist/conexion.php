<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");

$result = $conn->query("SELECT * FROM climae");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"Cliente":"'  . $rs["nomcli"] . '",';
  $outp .= '"Código":"'   . $rs["codcli"]        . '",';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>