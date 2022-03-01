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
			<h2>Modificacion de directorio</h2>
			<br>
		</div>	
		<?php
        $id= $_REQUEST['id'];
				$usu= $_SESSION["usuario"];
        $query = "select * from directorio_ti where iddir_ti='$id'";
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
			<form action="fx/modificardir.php?id=<?php echo $row['iddir_ti'];?>" method="post">
			<label class="w3-text-blue"><b>Proveedor</b></label>
			<input type="text" name="pro" class="w3-input w3-border" value="<?php echo $row['proveedor'] ?>">
			<label class="w3-text-blue"><b>Contacto</b></label>
			<input type="text" name="contac" class="w3-input w3-border" value="<?php echo $row['contacto'] ?>">
			<label class="w3-text-blue"><b>Descripcion</b></label>
			<input type="text" name="desc" class="w3-input w3-border" value="<?php echo $row['descripcion'] ?>">
			<label class="w3-text-blue"><b>Telefono Fijo</b></label>
			<input type="text" name="fijo" class="w3-input w3-border" value="<?php echo $row['tel_fijo'] ?>">
			<label class="w3-text-blue"><b>Celular</b></label>
			<input type="text" name="cel" class="w3-input w3-border" value="<?php echo $row['celular'] ?>">
				<label class="w3-text-blue"><b>Emails</b></label>
			<input type="text" name="mail" class="w3-input w3-border" value="<?php echo $row['emails'] ?>">
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
   <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>