<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_traficon");
$columns = array('keyordint', 'trabajo', 'f_ingreso', 'f_solicita', 'f_aprueba');

$query = "SELECT * FROM ordint WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'f_aprueba BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (keyordint LIKE "%'.$_POST["search"]["value"].'%" 
  OR trabajo LIKE "%'.$_POST["search"]["value"].'%" 
  OR f_ingreso LIKE "%'.$_POST["search"]["value"].'%" 
  OR f_solicita LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY keyordint ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["keyordint"];
 $sub_array[] = $row["trabajo"];
 $sub_array[] = $row["f_ingreso"];
 $sub_array[] = $row["f_solicita"];
 $sub_array[] = $row["f_aprueba"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM ordint";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => mysqli_query($connect, $query . $query1)
);

echo json_encode($output);

?>