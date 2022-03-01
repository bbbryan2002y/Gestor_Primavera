<?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
		</div>	
			<form action="fx/guardar_prestamo.php" method="post">
			<div class="w3-half w3-container">	
			<label class="w3-text-blue"><b>1. Nombre Solicitante</b></label>
			 <select class="w3-select w3-border" name="nom_usu"  >
    		    <?php  $resultado_area = mysqli_query($conexion, "SELECT * from personas");
        		  while ($rows = mysqli_fetch_assoc($resultado_area)){          
        		  ?> 
      			  <option value="<?php echo $rows['nombres']?>"><?php echo $rows['nombres']?></option>
      		<?php } ?>
      	  </select>

			<label class="w3-text-blue"><b>2. Descripcion</b></label>
			<input type="text" name="desc" class="w3-input w3-border">
			</div>
			<div class="w3-half w3-container">
			<label class="w3-text-blue"><b>3. Marca</b></label>
			<input type="text" name="marca" class="w3-input w3-border"></label>
			<label class="w3-text-blue"><b>4. Estado de entrega</b></label>
			<select name="estado_e"  class="w3-select w3-border">
			<option value="Bueno" selected >Bueno</option>
			<option value="Malo">Malo</option>
			</select>
			<br>
			</div>
			<div class="w3-container w3-rest w3-center">
				<br>	
			<input type="submit" class="w3-button w3-block w3-red">
			<br>
			</div>
	</div>
</form>
<br>
</div>
</div>
<br>
 <?php
} else {
  header("Location: index.php");
}
?>
