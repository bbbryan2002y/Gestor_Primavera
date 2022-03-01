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
      <form action="fx/guardardir.php" method="post">  
      <label class="w3-text-blue"><b>Proveedor</b></label>
      <input type="text" name="provedor" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Contacto</b></label>
      <input type="text" name="contacto" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Descripcion</b></label>
      <input type="text" name="desc" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Telefonos fijos</b></label>
      <input type="text" name="telf" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Celulares</b></label>
      <input type="text" name="cel" class="w3-input w3-border" required>
      <label class="w3-text-blue"><b>Correos</b></label>
      <input type="text" name="mail" class="w3-input w3-border" required>
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
