<?php 
include 'conec.php';
$tipo=$_POST['tipo'];

	$sql="SELECT `id_hoja_de_vida`, 
`serial`, marcas.marca, modelo.MODELO, 
`nombre_equipo`
FROM `hoja_de_vida_equipos` 
INNER JOIN marcas on hoja_de_vida_equipos.id_marca = marcas.id_marca
INNER JOIN modelo on hoja_de_vida_equipos.id_modelo = modelo.id_modelo where id_tipo='$tipo'";

	$result=mysqli_query($conexion,$sql);

	$cadena=" <label class='w3-text-blue'><b>Equipo</b></label> 
			<select id='equipo' name='equipo' class='w3-select w3-border'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'-'.utf8_encode($ver[3]).' Serial: '.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>