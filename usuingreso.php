
<script src="js/modules.js"></script><?php
	if($_SESSION["logueado"] == TRUE) {
		?>
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h3>Ingreso de usuario nuevo</h3>
		</div>	
			<form action="fx/guardarusu.php" method="post">
			<div class= "w3-container">  
      <label class="w3-text-blue"><b>Nombre usuario</b></label>
      <input type="text" name="usu" class="w3-input w3-border" required>
       <label class="w3-text-blue"><b>Contraseña</b></label>
      <input type="password" name="pass" class="w3-input w3-border" id="pass" required>
          <label class="w3-text-blue"><b>Confirmar Contraseña</b></label>
      <input type="password" name="pass2" class="w3-input w3-border" id="pass2" required>
       <label class="w3-text-blue"><b>Nombre Completo</b></label>
      <input type="text" name="nombre" class="w3-input w3-border"required>
     
      <label class="w3-text-blue"><b>Cargo</b></label>
      <input type="text" name="cargo" class="w3-input w3-border" required>
       </div>
      </div>
      <div class="w3-container w3-rest w3-center">
        <br>  
      <input type="submit" class="w3-button w3-block w3-red">
      <br>
      </div>
      <br>
      <br>
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
