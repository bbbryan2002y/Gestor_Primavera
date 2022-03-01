<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
	include("conec.php");
	$fecha = date("d-m-yy");

	header('Conetent-type: application/xls');
	header('Content-Disposition: attachment; filename=Lista de equipos T.I '.$fecha.'.xls');


$Consulta_Matriz="SELECT `id_hoja_de_vida`, 
 `fecha_adquisicion`, tipos.tipo, `serial`, marcas.marca, modelo.MODELO, 
`nombre_equipo`, disco.disco_gb, memoria.memoria, procesador.procesador, `direccion_mac`, 
pantallas.pantalla_pulgadas, office.office, sistemas_operativos.sistema_operativo, `costo`,`obsevaciones`
FROM `hoja_de_vida_equipos` 
INNER JOIN tipos on hoja_de_vida_equipos.id_tipo = tipos.id_tipo
INNER JOIN marcas on hoja_de_vida_equipos.id_marca = marcas.id_marca
INNER JOIN modelo on hoja_de_vida_equipos.id_modelo = modelo.id_modelo
INNER JOIN disco on hoja_de_vida_equipos.id_disco = disco.id_disco
INNER JOIN memoria on hoja_de_vida_equipos.id_memoria = memoria.id_memoria
INNER JOIN procesador on hoja_de_vida_equipos.id_procesador = procesador.id_procesador
INNER JOIN pantallas on hoja_de_vida_equipos.id_pantalla = pantallas.id_pantalla
INNER JOIN office on hoja_de_vida_equipos.id_office = office.id_office
INNER JOIN sistemas_operativos on hoja_de_vida_equipos.id_so = sistemas_operativos.id_so";

?>
<table>
  <tr style="background-color:green; color:white">
    <td><b>Id</b></td>
    <td><b>Fecha de adquisicion</b></td>
    <td><b>Tipo</b></td>
    <td><b>Serial/IMEI</b></td>
    <td><b>Matrca</b></td>
    <td><b>Modelo</b></td>
    <td><b>Nombre Equipo</b></td>
    <td><b>Disco</b></td>
    <td><b>Memoria</b></td>
    <td><b>Procesador</b></td>
    <td><b>Direccion MAC</b></td>
    <td><b>Pantalla</b></td>
    <td><b>Office</b></td>
    <td><b>Sistema Operativo</b></td>
    <td><b>Costo</b></td>
    <td><b>Observaciones</b></td>
</tr>
  <?php 	
  $resultado_consulta_mysql = mysqli_query($conexion, $Consulta_Matriz);
   while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
   ?>
  <tr>

<td><?php echo $row['id_hoja_de_vida']?></td>
<td><?php echo $row['fecha_adquisicion']?></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['serial']?></td>
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
<td><?php echo $row['obsevaciones']?></td>





            </tr>
<?php } ?>
 <?php
} else {
  header("Location: index.php");
}
?>