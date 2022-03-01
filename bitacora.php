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
			<h2>Bitacora de solicitudes</h2>
			<br>
		</div>	
		<?php
        $id= $_REQUEST['id'];
        echo "<div class='w3-container'>";
        echo "<h5>";
        echo "<b>";
        echo "Solicitud:  " ,$id;
        echo "</b>";
        echo "</h5>";
        echo "</div>";
    ?>
			<form action="fx/guardar_bitacora.php?id=<?php echo $id;?>" method="post">

			<label class="w3-text-blue"><b>Anotacion</b></label>
			<textarea name="nota" type="text" class="w3-input w3-border" rows="5" >
			</textarea>	
			
			<div class=" w3-center">
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