<?php
//3157404206
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingreso de solicitud</h3>
		</div>	
			<form action="fx/guardar_sol.php" method="post">
	
			<label class="w3-text-blue"><b>Descripcion solicitud</b></label>
			<input type="text" name="desc_sol" class="w3-input w3-border" required>
			<label class="w3-text-blue"><b>Tipo</b></label>
			<select name="tipos" class="w3-select w3-border">
				<option value="Soporte General">Soporte General</option>
				<option value="Equipos o Accesorios" >Equipos o Accesorios</option>
				<option value="Cuentas de usuario">Cuentas de usuario</option>
				<option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
				<option value="Mantenimiento correctivo">Mantenimiento correctivo</option>
				<option value="Consultas">Consultas</option>
				<option value="Requerimientos de Desarrollo">Requerimientos de Desarrollo</option>
				<option value="Otros">Otros</option>
			</select>
			<!-- User  -->
			<label class="w3-text-blue"><b>Solicitante</b></label>
			<select class="w3-select w3-border" name="solicitante" id="solicitante" >
				<?php  $resultado_area = mysqli_query($conexion, "SELECT * from personas WHERE estado = 0  ORDER BY nombres ASC");  // Estado = 1 Activo  !=  
						while ($rows = mysqli_fetch_assoc($resultado_area)){          
						?> 
						<option value="<?php echo $rows['nombres']?>"><?php echo $rows['nombres']?></option>
					<?php } ?>
			</select>
			<!-- Motivo -->
			<label class="w3-text-blue"><b>Motivo</b></label>
			<input type="text" name="motivo" class="w3-input w3-border" required>
			<br>

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
