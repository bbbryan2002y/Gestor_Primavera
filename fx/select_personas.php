<?php 
include 'conec.php';
$area=$_POST['area'];

	$sql="SELECT  `id_personas`, `nombres`, `id_area` FROM `personas` where id_area='$area'";

	$result=mysqli_query($conexion,$sql);

	$cadena=" <label class='w3-text-blue'><b>Persona</b></label> 
			<select id='persona' name='persona' class='w3-select w3-border'>";

	while ($ver=mysqli_fetch_assoc($result)) {
		$cadena=$cadena.'<option value='.$ver['id_personas'].'>'.$ver['nombres'].'</option>';
	}

	echo  $cadena."</select>";
	

?>