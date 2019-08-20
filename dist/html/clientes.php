<?php

$conexion = mysqli_connect("localhost", "root", "Tr4ff1cfouraM!by?S4atchi", "4am_comsysn");
$conexion->set_charset("utf8");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Get Customers</title>
	</head>
	<body>
		<form action="" method="post">
			<select name="getCustomers" id="all">
				<option value="" disabled selected>Selecione cliente</option>
				<?php
					$sql = "SELECT codcli, nomcli FROM climae";

					$query = $conexion -> query ($sql);

					while ($valores = mysqli_fetch_array($query)) {
						echo "<option value'".$valores['codcli']."'>".$valores['nomcli']."</option>";
					}
				?>
			</select>
		</form>
	</body>
</html>