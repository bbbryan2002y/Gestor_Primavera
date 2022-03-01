<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>

<?php 
	include('includes/head.inc');
	include('fx/conec.php');
 ?>
<!--La sesion-->
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
	<br><br>
	<div class="w3-row ">
		<div class="w3-container w3-rest w3-center">
			<h2>Modificacion de Ruta</h2>
			<br>
		</div>	
		<?php
        $id= $_REQUEST['id'];
				$usu= $_SESSION["usuario"];
        $query = "select * from pass where idpass='$id'";
        $resultado=$conexion->query($query);
        $row=$resultado->fetch_assoc();
        echo "<div class='w3-container'>";
        echo "<h5>";
        echo "<b>";
        echo "ID de elementos:  " ,$id;
        echo "</b>";
        echo "</h5>";
        echo "</div>";
    ?>
			<form action="fx/modificarpass.php?id=<?php echo $row['idpass'];?>" method="post">
			<div class="w3-half w3-container">	
			<label class="w3-text-blue"><b>Descripcion</b></label>
			<input type="text" name="descripcion" class="w3-input w3-border" value="<?php echo $row['nombrepass'] ?>">
			<label class="w3-text-blue"><b>Ruta</b></label>
			<input type="text" name="ruta" class="w3-input w3-border" value="<?php echo $row['ruta'] ?>">
			</div>
			<div class="w3-half w3-container">
			<label class="w3-text-blue"><b>Nombre de usuario</b></label>
			<input type="text" name="usu" class="w3-input w3-border" value="<?php echo $row['usu'] ?>">
			<label class="w3-text-blue"><b>Contraseña</b></label>
			<input type="text" name="pass" class="w3-input w3-border" value="<?php echo $row['pass'] ?>">
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
   <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>