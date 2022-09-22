<?php
include 'cnx.php';
function espera($zona){
	global $conectar;
	$res=mysqli_query($conectar,"BEGIN WORK");
	$res=mysqli_query($conectar,"use dapp");
	$sql="select count(expediente) as n from usuarios where zona_siguiente=".$zona;
	$res=mysqli_query($conectar,$sql);
	$row=mysqli_fetch_array($res);
	$n=$row['n'];
	$res=mysqli_query($conectar,"COMMIT");
	echo $n;
}
function actual($zona){
	global $conectar;
	$res=mysqli_query($conectar,"BEGIN WORK");
	$res=mysqli_query($conectar,"use dapp");
	$sql="select count(expediente) as n from usuarios where zona_actual=".$zona;
	$res=mysqli_query($conectar,$sql);
	$row=mysqli_fetch_array($res);
	$n=$row['n'];
	$res=mysqli_query($conectar,"COMMIT");
	echo $n;
}
?>
<DOCTYPE! html>
<html>
	<head>
	</head>
	<body>
		<?php
			$res=mysqli_query($conectar,"BEGIN WORK");
			$res=mysqli_query($conectar,"use dapp");
			$sql="select count(expediente) from usuarios where zona_actual!=5";
			$res=mysqli_query($conectar,$sql);
			$row=mysqli_fetch_array($res);
			$r=$row['count(expediente)'];
			$res=mysqli_query($conectar,"COMMIT");
			echo "pacientes en coi: ".$r;
		?>
		</br>
		<table>
			<thead>
                <tr>
                  <th scope="col">Zona</th>
                  <th scope="col">En espera</th>
				</tr>
            </thead>
			<thead>
                <tr>
                  <th scope="col">Recepeción</th>
                  <th scope="col"><?php espera(1);?></th>
				</tr>
            </thead>
			<thead>
                <tr>
                  <th scope="col">Toma de signos</th>
                  <th scope="col"><?php actual(2);?></td><td><?php espera(2);?></th>
				</tr>
            </thead>
			
			<tr>
				<td>toma de signos</td><td><?php actual(2);?></td><td><?php espera(2);?></td>
			</tr>
			<tr>
				<td>consulta</td><td><?php actual(3)?></td><td><?php espera(3);?></td>
			</tr>
			<tr>
				<td>sala</td><td><?php actual(4)?></td><td></td>
			</tr>
		</table>
		<br>
		<a href="./NuevoExpediente.php">Nuevo Expediente</a>
		</br>
		<a href="./Recepcion.php">Recepcion</a>
		</br>
		<a href="./Signos.php">Toma de Signos</a>
		</br>
		<a href="./Consulta.php">Consulta</a>
	</body>
</html>
