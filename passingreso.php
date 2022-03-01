<?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingreso de Ruta</h3>
		</div>	
			<form action="fx/guardarpass.php" method="post">
			<div class="w3-half w3-container">	
			<label class="w3-text-blue"><b>Descripcion</b></label>
			<input type="text" name="descripcion" class="w3-input w3-border" required>
			<label class="w3-text-blue"><b>Ruta</b></label>
			<input type="text" name="ruta" class="w3-input w3-border">
			</div>
			<div class="w3-half w3-container">
			<label class="w3-text-blue"><b>Nombre de usuario</b></label>
			<input type="text" name="usu" class="w3-input w3-border"></label>
			<label class="w3-text-blue"><b>Contraseña</b></label>
			<input type="text" name="pass" class="w3-input w3-border" required>
			<br>
			</div>
			<div class="w3-container w3-rest w3-center">
				<br>	
			<input type="submit" class="w3-button w3-block w3-red">
			<br>
			</div>
	</div>
</form>
</div>
</div>
 <?php
} else {
  header("Location: index.php");
}
?>
