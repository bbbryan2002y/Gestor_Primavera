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
			<h2>Devolucion</h2>
			<br>
		</div>	
		<?php
        $id= $_REQUEST['id'];
				$usu= $_SESSION["usuario"];
        $query = "SELECT * FROM `prestamo_equipos` where idprestamo='$id'";
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
			<form action="fx/devuelto.php?id=<?php echo $row['idprestamo'];?>" method="post">
			<div class="w3-container">	
			<label class="w3-text-blue"><b>Estado de entrega</b></label>
			<select name="estado_e"  class="w3-select w3-border">
			<option value="Bueno" selected >Bueno</option>
			<option value="Malo">Malo</option>
			</select>
			
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