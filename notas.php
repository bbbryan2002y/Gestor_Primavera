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
        echo "<a href='solicitudes.php' class='w3-btn w3-blue w3-round-xlarge'>Volver</a>";
        echo "</div>";

    ?>
  	
    <br>
  <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Nota</b></td>


</tr>
  <?php
  

 
  	$querybusqueda ="SELECT * FROM `bitacora` where consecutivo = '$id'";
 

  $resultado_consulta_mysql = mysqli_query($conexion, $querybusqueda);

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>

<td><?php echo $row['nota']?></td>
</tr>


<?php } ?>
</table>
</div>
</div>
<br>
</div>
   <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>
