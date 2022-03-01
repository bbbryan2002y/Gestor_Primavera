<style>
        .hide {display:none;}
        .red {color:Red;}
        .tabla_scroll{ overflow:scroll;height:50%; width:110%;}

    </style>
<!--La sesion-->
<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>
<!--resto del app-->		
<?php 
	include"includes/head.inc";
	include 'fx/conec.php';
 ?>
	<div class="w3-container w-sand">
		<!--si  cambia modifica-->
	<?php
	if(isset($_GET["modifico"])) {
		?>
		<div class="w3-panel w3-blue w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-blue w3-large w3-display-topright">&times;</span>
			<p>Se resolvio el requisito</p>
		</div>
		<?php
				}
	?>
	<!--si el usuario crea-->
	<?php
	if(isset($_GET["creo"])) {
		?>
		<div class="w3-panel w3-green w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-green w3-large w3-display-topright">&times;</span>
			<p>Solicitud creada correctamente</p>
		</div>
		<?php
				}
	?>
		<?php
	if(isset($_GET["nota"])) {
		?>
		<div class="w3-panel w3-green w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-green w3-large w3-display-topright">&times;</span>
			<p>Nota creada correctamente</p>
		</div>
		<?php
				}
	?>
<!--FIN DE MENSAJES-->
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Solicitudes T.I</center></h3>
		<div class="w3-container">
			<br>
				<div class="w3-container w3-center w3-border w3-round-small">
				<p><b>Busca tu Informacion aqui:</b></p>
				<input type="text" name="buscar" placeholder="Buscar..." id="searchTerm"  onkeyup="doSearch()" class="w3-input w3-border">
				<br>
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nueva Solicitud</button>
				<br>
				</div>
				 <div id="id01" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id01').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de solicitud: </h2>
      				</header>
    				<?php
    					include('sol_ingreso.php');
    				 ?>
    			</div>
    			</div>
			<br>
		</div>
<table class="w3-table-all tabla_scroll w3-responsive" id="datos">
  <tr class="w3-blue">
  <td><b>Consecutivo</b></td>
  <td><b>Responsable</b></td>
  <td><b>Descripcion solicitud</b></td>
  <td><b>Tipo</b></td>
  <td><b>Solicitante</b></td>
  <td><b>Motivo</b></td>
  <td><b>Fecha de creacion</b></td>
  <td><b>Fecha de finalizacion</b></td>
  <td><b>Estado</b></td>
  <td><b>Dias Transcurridos</b></td>
  <td></td>


</tr>
  <?php
  

 
  	$querybusqueda ="SELECT `id_solicitud`,`nombre_completo`,`consecutivo`,`desc_solicitud`,`tipo`,`solicitante`,`motivo`,`fecha_creacion`,`fecha_finalizacion`,`estado`,`dias_transcurridos` FROM `solicitudes_ti` INNER JOIN `usuarios` on `solicitudes_ti`.`creado` = `usuarios`.`usu` order by `id_solicitud` desc";
 

  $resultado_consulta_mysql = mysqli_query($conexion, $querybusqueda);

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['consecutivo']?></td>
<td><?php echo $row['nombre_completo']?></td>
<td><?php echo $row['desc_solicitud']?></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['solicitante']?></td>
<td><?php echo $row['motivo']?></td>
<td><?php echo $row['fecha_creacion']?></td>
<td><?php echo $row['fecha_finalizacion']?></td>
<td><?php echo $row['estado']?></td>
<td><?php echo $row['dias_transcurridos']?></td>

<td><a href="notas.php?id=<?php echo $row['consecutivo']; ?>" class="w3-btn w3-green w3-tiny w3-round" ><b>Ver Notas</b></a>
	<br>
	<?php 
	if($row['estado']=="Nuevo"){
	?>
	<br>
	<a href="bitacora.php?id=<?php echo $row['consecutivo']; ?>" class="w3-btn w3-green  w3-tiny w3-round" ><b>Agregar nota</b></a>
	<br>
<?php }else{ ?>
		
<?php } ?>	
<br>
	<?php 
	if($row['estado'] =="Nuevo" || $row['estado'] =="Reabierto" ){
	?>
	<a href="fx/resuelto.php?id=<?php echo $row['consecutivo']; ?>" class="w3-btn w3-red w3-tiny w3-round" ><b>Cambiar a resuelto</b></a>
<?php }else{ ?>
		<a href="fx/reabierto.php?id=<?php echo $row['consecutivo']; ?>" class="w3-btn w3-green  w3-tiny w3-round" ><b>Reabrir solicitud</b></a>
<?php } ?>	
</td>

</tr>
 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>

<br>
</table>
<br>
</div>
<br>
</div>
</div>
</div>
<script src="js/modules.js"></script>
	
 <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>
