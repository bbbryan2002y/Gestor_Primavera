<?php
  if($_SESSION["logueado"] == TRUE) {
    ?>

<?php 
  include('fx/conec.php');
 ?>

<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">

<form action="fx/areacambio.php" method="post">
	<br>
    <label class="w3-text-blue"><b>Nombre usuario</b></label>
      <select class="w3-select w3-border" name="usu">
        <?php  $resultado_usu = mysqli_query($conexion, "SELECT * from usuarios ");
          while ($rows = mysqli_fetch_assoc($resultado_usu)){         
          ?> 
        <option value="<?php echo $rows['idusu']?> "><?php echo $rows['nombre_completo'] ?>
        	<b>(<?php echo $rows['usu'] ?>)</b>
        </option>
      <?php } ?>
      </select>
      <br>
       <label class="w3-text-blue"><b>Area</b></label>
      <select class="w3-select w3-border" name="area">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * from areas ");
          while ($rows = mysqli_fetch_assoc($resultado_area)){
          
          ?> 
         
        <option value="<?php echo $rows['idarea']?> "><?php echo $rows['nombre_area']?></option>
      <?php } ?>
      </select> 
      <br> 
      <br>    
		<input type="submit" class="w3-button w3-block w3-red">
      <br>
  </form>
</div>
</div>

<?php
 } else {
  header("Location: index.php");
}
?>
