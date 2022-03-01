<style>
        .hide {display:none;}
        .red {color:Red;}
         #tabla_scroll{ overflow:scroll;height:40%; width:100%;}
    </style>
<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>

<?php 
	include('includes/head.inc');
	include('fx/conec.php');
    $fecha=date("yy-m-d");
    
 ?>
<!--La sesion-->
    <div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
	<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Registro activididad</center></h3>
		<div class="w3-container">
			<br>
                
				<div class="w3-container  w3-border w3-round-small">
				<p class="w3-center"><b>Busca tu Informacion aqui:</b></p>


                  <label><b>Buscar por fecha: </b></label>
				<input type="date" name="buscar" placeholder="Buscar..." id="searchTerm" class="w3-input w3-border" value="<?php echo $fecha; ?>" onclick="doSearch()">
                <br>
                <br>
                <br>
            </div>

        <br>
        <?php 
          $dequien = $_SESSION["usuario"];
			$sql = "SELECT count(idreg) total FROM `regingreso` WHERE `regusu` ='$dequien' ";
			$result = mysqli_query($conexion, $sql);
			$fila = mysqli_fetch_assoc($result);
 		?>
        		<table>
        			<tr class="">
        				<td><b>Total ingresos</b> </td>
        				<td><span class="w3-badge w3-red"><?php echo  $fila['total']; ?></span></td>
        			</tr>
        		</table>
				</div>
			<br>
		</div>
        <div class="w3-container w3-card w3-border" id="tabla_scroll">
            <br>
<table class="w3-table-all" id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Fecha</b></td>
  <td><b>Quien</b></td>

</tr>
  <?php

  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `regingreso` WHERE `regusu` ='$dequien' ORDER BY Fecha DESC");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['idreg']?></td>
<td><?php echo $row['fecha']?></td>
<td><?php echo $row['regusu']?></td>
<tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
</tr>
<?php } ?>
</div>

</table>
</div>
<div class="w3-col" style="width:5%" ><p></p></div>
</div>
</div>
</div>
<script src="js/modules.js"></script>

 <?php
} else {
  header("Location: index.php");
}
?>