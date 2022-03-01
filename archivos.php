<style>
        .hide {display:none;}
        .red {color:Red;}
        #tabla_scroll{ overflow:scroll;height:40%; width:100%;}
 </style>
<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>
<!--resto del app-->		
<?php 
	include("includes/head.inc");
	include 'fx/conec.php';
 ?>
	<div class="w3-container">
	<!--si  borra-->
	<?php
	if(isset($_GET["borro"])) {
		?>
		<div class="w3-panel w3-red w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-red w3-large w3-display-topright">&times;</span>
			<p>Archivo borrado correctamente</p>
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
			<p>Archivo subido correctamente</p>
		</div>
		<?php
				}
	?>
<!--FIN DE MENSAJES-->
		<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Gestiona tus archivos aqui:</center></h3>
		<div class="w3-container">
				<div class="w3-container">
			<br>
				<div class="w3-container w3-center w3-border w3-round-small">
				<p><b>Busca tu Informacion aqui:</b></p>
				<input type="text" name="buscar" placeholder="Buscar..." id="searchTerm"  onkeyup="doSearch()" class="w3-input w3-border">
        <br>
				</div>
			<br>
			 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo archivo</button>
		</div>
			 <div id="id01" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id01').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de ruta: </h2>
      				</header>
				<div class="w3-container w3-center w3-border w3-round-small">
				<form action="fx/subir.php" method="post" enctype="multipart/form-data">
					<br>
				<input type="file" name="uploadedfile" placeholder="subir" id="searchTerm" class="w3-input w3-border" required>
				<br>
				<input type="submit" class="w3-button w3-block w3-blue w3-round-large">
				</form>
        		<br>
				</div>
			</div>
		</div>
			<br>
		</div>
		
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Nombre archivo</b></td>
  <td><b>Tipo</b></td>
  <td><b>Tamaño</b></td>
  <td><b>Subido por</b></td>
  <td></td>
  <td></td>

</tr>
  <?php
  $de = $_SESSION["usuario"];
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `archivos` ");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['idarchivo']?></td>
<td><a href="uploads/<?php echo $row['nombre']?>" target="_blank"><?php echo $row['nombre']?></a></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['tamano']?></td>
<td><?php echo $row['subido_por']?></td>
<td><a href="fx/borrar_archivo.php?name=<?php echo $row['nombre']; ?>" onclick="return confirmar()" class="w3-btn w3-red w3-round-xlarge">Borrar</a></td>
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
	</div>
 <?php
 } else {
  header("Location: index.php");
}
?>
