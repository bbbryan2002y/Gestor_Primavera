<style>
        .hide {display:none;}
        .red {color:Red;}
        #tabla_scroll{ overflow:scroll;height:40%; width:100%;}
    </style>
<?php
include 'fx/conec.php';
	session_start();
	  //saber area
	$de = $_SESSION["usuario"];
	$areaquery="SELECT `idarea` FROM `usuarios` WHERE `usu` ='$de' ";
	$arearow=mysqli_query($conexion,$areaquery);

    while ($row = mysqli_fetch_assoc($arearow)){
		$area=$row['idarea'];
	}
	//fin area
	if($_SESSION["logueado"] == TRUE && $area==1 )  {
		include('includes/adminhead.inc');
		?>
	<div class="w3-container w-sand">
		<!--si  cambia modifica-->
	<?php
	if(isset($_GET["modifico"])) {
		?>
		<div class="w3-panel w3-blue w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-blue w3-large w3-display-topright">&times;</span>
			<p>Se actualizo el usuario correctamente</p>
		</div>
		<?php
				}
	?>
	<!--si  borra-->
	<?php
	if(isset($_GET["borro"])) {
		?>
		<div class="w3-panel w3-red w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-red w3-large w3-display-topright">&times;</span>
			<p>Se borro el usuario correctamente</p>
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
			<p>Usuario creado correctamente</p>
		</div>
		<?php
				}
	?>
	<!--error con las pass-->
		<?php
	if(isset($_GET["error"])) {
		?>
		<div class="w3-panel w3-red w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-red w3-large w3-display-topright">&times;</span>
			<p>Las contraseñas no coinciden</p>
		</div>
		<?php
				}
	?>
	<!--si modifico root-->
		<?php
	if(isset($_GET["modroot"])) {
		?>
		<div class="w3-panel w3-yellow w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-yellow w3-large w3-display-topright">&times;</span>
			<p>El usuario maestro no puede ser modificado</p>
		</div>
		<?php
				}
	?>
	<!--si intenta borrar root-->
	<?php
	if(isset($_GET["eroot"])) {
		?>
		<div class="w3-panel w3-yellow w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-yellow w3-large w3-display-topright">&times;</span>
			<p>El usuario maestro no puede ser Eliminado</p>
		</div>
		<?php
				}
	?>

			<?php
	if(isset($_GET["cambiopass"])) {
		?>
		<div class="w3-panel w3-blue w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-blue w3-large w3-display-topright">&times;</span>
			<p>Constraseña cambiada</p>
		</div>
		<?php
				}
	?>

			<?php
	if(isset($_GET["cambioarea"])) {
		?>
		<div class="w3-panel w3-green w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-green w3-large w3-display-topright">&times;</span>
			<p>Area cambiada</p>
		</div>
		<?php
				}
	?>




<!--FIN DE MENSAJES-->
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Usuarios registrados</center></h3>
		<div class="w3-container">
			<br>
				<div class="w3-container w3-center w3-border w3-round-small">
				<p><b>Busca tu Informacion aqui:</b></p>
				<input type="text" name="buscar" placeholder="Buscar..." id="searchTerm"  onkeyup="doSearch()" class="w3-input w3-border">
				<br>
				</div>
				<br>
				 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo usuario</button>
				 <div id="id01" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id01').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de usuario: </h2>
      				</header>
    				<?php
    					include('usuingreso.php');
    				 ?>
    			</div>
    			</div>
					<br>
    

    			
				

			<br>
		</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td>Id</td>
  <td>Nombre usuario</td>
  <td>Nombre completo</td>
  <td>Cargo</td>
  <td>Area</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>


</tr>
  <?php
  $dequien = $_SESSION["usuario"];
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT usuarios.idusu, usuarios.usu, usuarios.nombre_completo,  usuarios.cargo, areas.nombre_area FROM `usuarios` inner join areas on usuarios.idarea = areas.idarea");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['idusu']?></td>
<td><?php echo $row['usu']?></td>
<td><?php echo $row['nombre_completo']?></td>
<td><?php echo $row['cargo']?></td>
<td><?php echo $row['nombre_area']?></td>
<td><a href="editarusu.php?id=<?php echo $row['idusu']; ?>" class="w3-btn w3-blue w3-round-xlarge">Editar</a></td>
<td><a href="fx/borrar_usu.php?id=<?php echo $row['idusu']; ?>" onclick="return confirmar()" class="w3-btn w3-red w3-round-xlarge">Borrar</a></td>
<td><a href="cambio_pass.php?id=<?php echo $row['idusu']; ?>" class="w3-btn w3-green w3-round-xlarge">Cambiar contraseña</a></td>

</tr>
 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
</div>
<br>
</table>
</div>
</div>
</div>
</div>
<script src="js/modules.js"></script>
		 <?php
 } else {
  header("Location: dashboard.php");
}
?>
