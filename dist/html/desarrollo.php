<?php 

	$conexion=mysqli_connect('localhost:3306','root','Tr4ff1cfouraM!by?S4atchi','4am_traficon');
	if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 ?>
 <?php 

	$conexiontwo=mysqli_connect('localhost:3306','root','Tr4ff1cfouraM!by?S4atchi','4am_comsysn');
	if (!$conexiontwo) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>Pais</td>
			<td>Agencia</td>
			<td>Año de orden interna</td>
			<td>Fecha prometida</td>
			<td>Fecha Ingreso</td>
			<td>Fecha Solicitada</td>
			<td>Fecha Entregada</td>
			<td>Estado de orden</td>	
			<td>Código de orden interno</td>	
			<td>Código de Cliente</td>
			<td>Nombre de Cliente</td>
		</tr>

		<?php 
		$sql="SELECT * from ordint";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['codpai'] ?></td>
			<td><?php echo $mostrar['codagencia'] ?></td>
			<td><?php echo $mostrar['anioordint'] ?></td>
			<td><?php echo $mostrar['f_promete'] ?></td>
			<td><?php echo $mostrar['f_ingreso'] ?></td>
			<td><?php echo $mostrar['f_solicita'] ?></td>
			<td><?php echo $mostrar['f_entrega'] ?></td>
			<td><?php echo $mostrar['codstat'] ?></td>
			<td><?php echo $mostrar['codordint'] ?></td>
			<td><?php echo $mostrar['codcli'] ?></td>
	<?php 
	}
	 ?>
	 <?php 
		$sql="SELECT * from climae";
		$result=mysqli_query($conexiontwo,$sql);

		while($alldatos=mysqli_fetch_array($result)){
		 ?>
			<td><?php echo $alldatos['nomcli'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>