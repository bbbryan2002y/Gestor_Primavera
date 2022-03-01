<?php
	if($_SESSION["logueado"] == TRUE) {
		?>
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingrese Marca Nueva</h3>
		</div>	
			<form action="fx/guardar_asignacion.php" method="post">
			<div class="w3-container w3-rest">	
				 <label class="w3-text-blue"><b>Seleccionar Areas:</b></label>
      <select class="w3-select w3-border" name="area" id="area" >
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * FROM `areas`");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
        <option value="<?php echo $rows['idarea']?> " ><?php echo $rows['nombre_area']?></option>
      <?php } ?>
      </select>
      <div id="select3lista"></div>
  
			</div>

			 <label class="w3-text-blue"><b>Tipo</b></label>
      <select class="w3-select w3-border" name="tipos" id="tipos" >
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from tipos");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
        <option value="<?php echo $rows['id_tipo']?>"><?php echo $rows['tipo']?></option>
      <?php } ?>
      </select>
		
      	<div id="select2lista"></div>
  
			</div>
			<label class="w3-text-blue"><b>Observaciones</b></label>
			<input type="text" name="observaciones" value="Ninguna" class="w3-input w3-border">
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#tipos').val(1);
		recargarLista();

		$('#tipos').change(function(){
			recargarLista(); 
		});
	})

	$(document).ready(function(){
		$('#area').val(1);
		recargarLista2();

		$('#area').change(function(){
			recargarLista2();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"fx/select_tipo.php",
			data:"tipo=" + $('#tipos').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}

	function recargarLista2(){
		$.ajax({
			type:"POST",
			url:"fx/select_personas.php",
			data:"area=" + $('#area').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
