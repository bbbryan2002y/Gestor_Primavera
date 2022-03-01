<style>
        .hide {display:none;}
        .red {color:Red;}
        #tabla_scroll{ overflow:scroll;height:80%; width:100%;}
    </style>
<!--La sesion-->


<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>
<!--resto del app-->		
<?php 
	include"includes/head.inc";
	include 'fx/conec.php';
 ?>


	<div class="w3-container w-sand">
		<!--si  cambia modifica-->
	<?php
	if(isset($_GET["modifico"])) {
		?>
		<div class="w3-panel w3-blue w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-blue w3-large w3-display-topright">&times;</span>
			<p>Equipo reasignado correctamente</p>
		</div>
		<?php
				}
	?>
	<!--si  borra-->
	<?php
	if(isset($_GET["cambio"])) {
		?>
		<div class="w3-panel w3-red w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-red w3-large w3-display-topright">&times;</span>
			<p>Estado del elemento cambiado</p>
		</div>
		<?php
				}
	?>
	<!--si el usuario crea-->
	<?php
	if(isset($_GET["creo"])) {
		?>
		<div class="w3-panel w3-green w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-green w3-large w3-display-topright">&times;</span>
			<p>Elemento creado correctamente</p>
		</div>
		<?php
				}
	?>
<!--FIN DE MENSAJES-->
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Matriz de inventario</center></h3>
		<div class="w3-container">
			<br>
				<div class="w3-container w3-center w3-border w3-round-small">
				<p><b>Busca tu Informacion aqui:</b></p>
				<input type="text" name="buscar" placeholder="Buscar..." id="searchTerm"  onkeyup="doSearch()" class="w3-input w3-border">
				<br>
			
				<br>
					  <form method="post" action="fx/exportar.php">
            		<input type="submit" name="exportar" value="Exportar Matriz de inventario" class="w3-button w3-block w3-green w3-round-large">
           			</form>
           			 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Asignar un equipo nuevo</button>
           			 <br>
           			 <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-red"> 
               <span onclick="document.getElementById('id01').style.display='none'" 
               class="w3-button w3-display-topright">&times;</span>
                <h2>Asignacion nueva: </h2>
              </header>
            <?php
              include('asignacion.php');
             ?>
          </div>
          </div>
           			</div>	
			
				
			<br>
		</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Consecutivo</b></td>
  <td><b>Usuario</b></td>
  <td><b>Cargo</b></td>
  <td><b>Area</b></td>
  <td><b>Fecha de adquisicion</b></td>
  <td><b>Tipo</b></td>
  <td><b>Serial/IMEI</b></td>
  <td><b>Marca</b></td>
  <td><b>Modelo</b></td>
  <td><b>Nombre Equipo</b></td>
  <td><b>Disco duro</b></td>
  <td><b>Memoria Ram</b></td>
  <td><b>Procesador</b></td>
  <td><b>Direccion MAC</b></td>
  <td><b>Pantalla</b></td>
  <td><b>Office</b></td>
  <td><b>Licencia Office</b></td>
  <td><b>Sistema operativo</b></td>
  <td><b>Licencia SO</b></td>
  <td><b>Costo</b></td>
  <td><b>Observciones</b></td>
  <td></td>
  <td></td>




</tr>
  <?php
  $dequien = $_SESSION["usuario"];
  $Consulta_Matriz=" SELECT `id_matriz`, `consecutivo`, personas.`nombres`, cargos.`cargo`, areas.nombre_area,
  `fecha_adquisicion`, tipos.tipo, `serial_imei`, marcas.marca, modelo.MODELO, 
 `nombre_equipo`, disco.disco_gb, memoria.memoria, procesador.procesador, `direccion_mac`, 
 pantallas.pantalla_pulgadas, office.office,`licencia_office`, sistemas_operativos.sistema_operativo,`licencia_SO`,`costo`,`OBSERVACIONES` 
 FROM `matriz_inventario` 
 INNER JOIN personas on matriz_inventario.persona = personas.id_personas
 INNER JOIN cargos on matriz_inventario.cargo = cargos.id_cargo
 INNER JOIN areas on matriz_inventario.idarea = areas.idarea
 INNER JOIN tipos on matriz_inventario.id_tipo = tipos.id_tipo
 INNER JOIN marcas on matriz_inventario.id_marca = marcas.id_marca
 INNER JOIN modelo on matriz_inventario.id_modelo = modelo.id_modelo
 INNER JOIN disco on matriz_inventario.id_disco = disco.id_disco
 INNER JOIN memoria on matriz_inventario.id_memoria = memoria.id_memoria
 INNER JOIN procesador on matriz_inventario.id_procesador = procesador.id_procesador
 INNER JOIN pantallas on matriz_inventario.id_pantalla = pantallas.id_pantalla
 INNER JOIN office on matriz_inventario.id_office = office.id_office
 INNER JOIN sistemas_operativos on matriz_inventario.id_so = sistemas_operativos.id_so order by id_matriz desc";

  $resultado_consulta_mysql = mysqli_query($conexion, $Consulta_Matriz);

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_matriz']?></td>
<td><?php echo $row['consecutivo']?></td>
<td><?php echo $row['nombres']?></td>
<td><?php echo $row['cargo']?></td>

<td><?php echo $row['nombre_area']?></td>
<td><?php echo $row['fecha_adquisicion']?></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['serial_imei']?></td>

<td><?php echo $row['marca']?></td>
<td><?php echo $row['MODELO']?></td>
<td><?php echo $row['nombre_equipo']?></td>
<td><?php echo $row['disco_gb']?></td>

<td><?php echo $row['memoria']?></td>
<td><?php echo $row['procesador']?></td>
<td><?php echo $row['direccion_mac']?></td>
<td><?php echo $row['pantalla_pulgadas']?></td>

<td><?php echo $row['office']?></td>
<td><?php echo $row['licencia_office']?></td>
<td><?php echo $row['sistema_operativo']?></td>
<td><?php echo $row['licencia_SO']?></td>
<td><?php echo $row['costo']?></td>
<td><?php echo $row['OBSERVACIONES']?></td>
<td><a href="reasignacion.php?id=<?php echo $row['id_matriz']; ?>" class="w3-btn w3-green w3-round-xlarge">Reasigar</a></td>
<!-- <td><a href="fx/cambiar_estado.php?id=<?php echo $row['id_matriz']; ?>" onclick="return confirmation()" class="w3-btn w3-red w3-round-xlarge">Cambio de estado</a></td> -->
<td><a href="hoja_vida/hoja_vida.php?id=<?php echo $row['id_matriz']; ?>" class="w3-btn w3-blue w3-round-xlarge">Hoja Vida</td> 
<td>
  </td>

</tr>
 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
</div>
<br>
</table>
</div>
<br><br>
</div>
</div>
</div>
<script src="js/modules.js"></script>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
 <script type="text/javascript">
         function confirmation() 
     {
        if(confirm("Esta seguro de cambiar el estado del elemento?"))
  {
     return true;
  }
  else
  {
     return false;
  }
     }

       </script>

	
 <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>
