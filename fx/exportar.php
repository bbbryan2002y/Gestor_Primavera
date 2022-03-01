<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
	include("conec.php");
	$fecha = date("d-m-yy");

	header('Conetent-type: application/xls');
	header('Content-Disposition: attachment; filename=Matriz de inventario '.$fecha.'.xls');


$Consulta_Matriz="SELECT `id_matriz`, `consecutivo`, `usuario`, `cargo`, areas.nombre_area,
 `fecha_adquisicion`, tipos.tipo, `serial_imei`, marcas.marca, modelo.MODELO, 
`nombre_equipo`, disco.disco_gb, memoria.memoria, procesador.procesador, `direccion_mac`, 
pantallas.pantalla_pulgadas, office.office, sistemas_operativos.sistema_operativo, `costo`,`disponible`, `OBSERVACIONES` 
FROM `matriz_inventario` 
INNER JOIN areas on matriz_inventario.idarea = areas.idarea
INNER JOIN tipos on matriz_inventario.id_tipo = tipos.id_tipo
INNER JOIN marcas on matriz_inventario.id_marca = marcas.id_marca
INNER JOIN modelo on matriz_inventario.id_modelo = modelo.id_modelo
INNER JOIN disco on matriz_inventario.id_disco = disco.id_disco
INNER JOIN memoria on matriz_inventario.id_memoria = memoria.id_memoria
INNER JOIN procesador on matriz_inventario.id_procesador = procesador.id_procesador
INNER JOIN pantallas on matriz_inventario.id_pantalla = pantallas.id_pantalla
INNER JOIN office on matriz_inventario.id_office = office.id_office
INNER JOIN sistemas_operativos on matriz_inventario.id_so = sistemas_operativos.id_so
ORDER by id_matriz DESC";

?>
<table>
  <tr style="background-color:green; color:white">
  <td><b>Id</b></td>
  <td><b>Consecutivo</b></td>
  <td><b>Usuario</b></td>
  <td><b>Cargo</b></td>
  <td><b>Area</b></td>
  <td><b>Fecha de adquisicion</b></td>
  <td><b>Tipo</b></td>
  <td><b>Serial/IMEI</b></td>
  <td><b>Marca</b></td>
  <td><b>Modelo</b></td>
  <td><b>Nombre Equipo</b></td>
  <td><b>Disco duro</b></td>
  <td><b>Memoria Ram</b></td>
  <td><b>Procesador</b></td>
  <td><b>Direccion MAC</b></td>
  <td><b>Pantalla</b></td>
  <td><b>Office</b></td>
  <td><b>Sistema operativo</b></td>
  <td><b>Costo</b></td>
  <td><b>Disponibilidad</b></td>
  <td><b>Observciones</b></td>
  </tr>
  <?php 	
  $resultado_consulta_mysql = mysqli_query($conexion, $Consulta_Matriz);
   while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
   ?>
  <tr>
<td><?php echo $row['id_matriz']?></td>
<td><?php echo $row['consecutivo']?></td>
<td><?php echo $row['usuario']?></td>
<td><?php echo $row['cargo']?></td>
<td><?php echo $row['nombre_area']?></td>
<td><?php echo $row['fecha_adquisicion']?></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['serial_imei']?></td>
<td><?php echo $row['marca']?></td>
<td><?php echo $row['MODELO']?></td>
<td><?php echo $row['nombre_equipo']?></td>
<td><?php echo $row['disco_gb']?></td>
<td><?php echo $row['memoria']?></td>
<td><?php echo $row['procesador']?></td>
<td><?php echo $row['direccion_mac']?></td>
<td><?php echo $row['pantalla_pulgadas']?></td>
<td><?php echo $row['office']?></td>
<td><?php echo $row['sistema_operativo']?></td>
<td><?php echo $row['costo']?></td>
<td><?php echo $row['disponible']?></td>
<td><?php echo $row['OBSERVACIONES']?></td>
</tr>
<?php } ?>
 <?php
} else {
  header("Location: index.php");
}
?>