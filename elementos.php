<script src="js/modules.js"></script><?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingreso de nuevos elementos</h3>
		</div>	
			<form action="fx/guardar_equipo.php" method="post">
			<div class="w3-half w3-container"> 
      <label class="w3-text-blue"><b>Marca</b></label>
      <select class="w3-select w3-border" name="marca">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from marcas");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?>      
        <option value="<?php echo $rows['id_marca']?> "><?php echo $rows['marca']?></option>
      <?php } ?>
      </select>

       <label class="w3-text-blue"><b>Modelo</b></label>
      <select class="w3-select w3-border" name="modelo">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from modelo");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_modelo']?> "><?php echo $rows['MODELO']?></option>
      <?php } ?>
      </select>
       <label class="w3-text-blue"><b>Disco Duro (GB)</b></label>
      <select class="w3-select w3-border" name="disco_d">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from disco");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_disco']?> "><?php echo $rows['disco_gb']?></option>
      <?php } ?>
      </select>
      <label class="w3-text-blue"><b>Procesador</b></label>
      <select class="w3-select w3-border" name="procesador">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from procesador");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_procesador']?> "><?php echo $rows['procesador']?></option>
      <?php } ?>
      </select>
      <label class="w3-text-blue"><b>Pantalla (Pulgadas)</b></label>
      <select class="w3-select w3-border" name="pantalla">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from pantallas");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_pantalla']?> "><?php echo $rows['pantalla_pulgadas']?></option>
      <?php } ?>
      </select>
      <label class="w3-text-blue"><b>Office</b></label>
      <select class="w3-select w3-border" name="office">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from office");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?>      
        <option value="<?php echo $rows['id_office']?> "><?php echo $rows['office']?></option>
      <?php } ?>
      </select>
            <label class="w3-text-blue"><b>Costo($)</b></label>
      <input type="number" name="costos" class="w3-input w3-border" required>
      




      </div>


      <div class="w3-half w3-container">
      	      <label class="w3-text-blue"><b>Fecha Adquisicion</b></label>
      <input type="date" name="fecha_ad" class="w3-input w3-border" required>
        <label class="w3-text-blue"><b>Tipo</b></label>
      <select class="w3-select w3-border" name="tipos">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from tipos");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_tipo']?> "><?php echo $rows['tipo']?></option>
      <?php } ?>
      </select>
      <label class="w3-text-blue"><b>Serial</b></label>
      <input type="text" name="serial" class="w3-input w3-border" required>

      <label class="w3-text-blue"><b>Nombre Equipo</b></label>
      <input type="text" name="nombre_e" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Memoria RAM(GB)</b></label>
      <select class="w3-select w3-border" name="memoria">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from memoria");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_memoria']?> "><?php echo $rows['memoria']?></option>
      <?php } ?>
      </select>
      <label class="w3-text-blue"><b>Direccion MAC</b></label>
      <input type="text" name="mac" class="w3-input w3-border" required>
       <label class="w3-text-blue"><b>Sistema Operativo</b></label>
      <select class="w3-select w3-border" name="so">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from sistemas_operativos");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['id_so']?> "><?php echo $rows['sistema_operativo']?></option>
      <?php } ?>
      </select>
      </div>
      <div class="w3-rest w3-container">
      <label class="w3-text-blue"><b>Observaciones</b></label>
      <input type="text" name="observaciones" class="w3-input w3-border" required value="Ninguno">
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
<br>	
 <?php
} else {
  header("Location: index.php");
}
?>