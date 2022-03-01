<?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingrese Office Nuevo</h3>
		</div>	
			<form action="fx/guardar_office.php" method="post">
			<div class="w3-container w3-rest">	
				 
			<label class="w3-text-blue"><b>Office</b></label>
			<input type="text" name="office" class="w3-input w3-border" required>
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
