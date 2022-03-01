<?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingrese Modelo Nueva</h3>
		</div>	
			<form action="fx/guardar_modelo.php" method="post">
			<div class="w3-container w3-rest">
			<label class="w3-text-blue"><b>Marca</b></label>
      			<select class="w3-select w3-border" name="marca">
        		<?php  $resultado_area = mysqli_query($conexion, "SELECT * from marcas");
          		while ($rows = mysqli_fetch_assoc($resultado_area)){          
          			?>      
        		<option value="<?php echo $rows['id_marca']?> "><?php echo $rows['marca']?></option>
      			<?php } ?>
      			</select>	
			<label class="w3-text-blue"><b>Nombre modelo</b></label>
			<input type="text" name="modelo" class="w3-input w3-border" required>
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
