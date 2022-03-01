<style>
        .hide {display:none;}
        .red {color:Red;}
        #tabla_scroll{ overflow:scroll;height:60%; width:100%;}
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
			<p>Se actualizo la Ruta correctamente</p>
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
			<p>Equipo ingresado correctamente</p>
		</div>
		<?php
				}
	?>
<!--FIN DE MENSAJES-->
<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
  <h3><center>Maestro de inventario</center></h3>
  </div>

  <div class="w3-container ">
  <h3><center>Equipos diponibles</center></h3>
  <br>
  <div class="w3-container w3-center w3-border w3-round-small">
        <p><b>Busca tu Informacion aqui:</b></p>
        <input type="text" name="buscar" placeholder="Buscar..." id="searchTerm"  onkeyup="doSearch()" class="w3-input w3-border">
        <br>
           <form method="post" action="fx/exportar_equipos.php">
            <input type="submit" name="exportar" value="Exportar Listado equipos" class="w3-button w3-block w3-green w3-round-large">
           </form>

        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo Equipo</button>
       <br>
        </div>

          <br>
         <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-red"> 
               <span onclick="document.getElementById('id01').style.display='none'" 
               class="w3-button w3-display-topright">&times;</span>
                <h2>Ingreso de elementos: </h2>
              </header>
            <?php
              include('elementos.php');
             ?>
          </div>
          </div>
      <div class="w3-responsive w3-border" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
    <td><b>Id</b></td>
    <td><b>Fecha adiqusion</b></td>
    <td><b>Tipo</b></td>
    <td><b>Serial/IMEI</b></td>
    <td><b>Marca</b></td>
    <td><b>Modelo</b></td>
    <td><b>Nombre Equipo</b></td>
    <td><b>Disco</b></td>
    <td><b>Memoria</b></td>
    <td><b>Procesador</b></td>
    <td><b>Direccion MAC</b></td>
    <td><b>Pantalla</b></td>
    <td><b>Office</b></td>
    <td><b>Sistema Operativo</b></td>
    <td><b>Costo</b></td>




</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT `id_hoja_de_vida`, 
 `fecha_adquisicion`, tipos.tipo, `serial`, marcas.marca, modelo.MODELO, 
`nombre_equipo`, disco.disco_gb, memoria.memoria, procesador.procesador, `direccion_mac`, 
pantallas.pantalla_pulgadas, office.office, sistemas_operativos.sistema_operativo, `costo`
FROM `hoja_de_vida_equipos` 
INNER JOIN tipos on hoja_de_vida_equipos.id_tipo = tipos.id_tipo
INNER JOIN marcas on hoja_de_vida_equipos.id_marca = marcas.id_marca
INNER JOIN modelo on hoja_de_vida_equipos.id_modelo = modelo.id_modelo
INNER JOIN disco on hoja_de_vida_equipos.id_disco = disco.id_disco
INNER JOIN memoria on hoja_de_vida_equipos.id_memoria = memoria.id_memoria
INNER JOIN procesador on hoja_de_vida_equipos.id_procesador = procesador.id_procesador
INNER JOIN pantallas on hoja_de_vida_equipos.id_pantalla = pantallas.id_pantalla
INNER JOIN office on hoja_de_vida_equipos.id_office = office.id_office
INNER JOIN sistemas_operativos on hoja_de_vida_equipos.id_so = sistemas_operativos.id_so ORDER by `id_hoja_de_vida` desc");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_hoja_de_vida']?></td>
<td><?php echo $row['fecha_adquisicion']?></td>
<td><?php echo $row['tipo']?></td>
<td><?php echo $row['serial']?></td>
<td><?php echo $row['marca']?></td>
<td><?php echo $row['MODELO']?></td>
<td><?php echo $row['nombre_equipo']?></td>
<td><?php echo $row['disco_gb']?></td>
<td><?php echo $row['memoria']?></td>
<td><?php echo $row['procesador']?></td>
<td><?php echo $row['direccion_mac']?></td>
<td><?php echo $row['pantalla_pulgadas']?></td>
<td><?php echo $row['office']?></td>
<td><?php echo $row['sistema_operativo']?></td>
<td><?php echo $row['costo']?></td>





 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>


<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-row">
    <div class="w3-col" style="width:5%"><p></p></div>
<div class="w3-col" style="width:90%">
	<h3><center>Maestro de inventario</center></h3>
	</div>

	<div class="w3-container w3-half">
	<h3><center>Marcas</center></h3>
	<br>
	 <button onclick="document.getElementById('id09').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id09" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id09').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('marcas.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Marca</b></td>

</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `marcas`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_marca']?></td>
<td><?php echo $row['marca']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>



<div class="w3-container  w3-half">
	<h3><center>Modelos</center></h3>
	<br>
	 <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id02" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id02').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('modelos.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Marca</b></td>
  <td><b>Modelo</b></td>

</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT id_modelo,marcas.marca, `MODELO` FROM `modelo` INNER JOIN marcas on modelo.id_marca = marcas.id_marca");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_modelo']?></td>
<td><?php echo $row['marca']?></td>
<td><?php echo $row['MODELO']?></td>


 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
	<h3><center>Tipos</center></h3>
	 <button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id03" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id03').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('tipos.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>tipo</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `tipos`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_tipo']?></td>
<td><?php echo $row['tipo']?></td>


 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
	<h3><center>Disco duro </center></h3>
	 <button onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id04" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id04').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('disco.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Disco duro(GB)</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `disco`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_disco']?></td>
<td><?php echo $row['disco_gb']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container  w3-half">
	<h3><center>Memoria RAM</center></h3>
	 <button onclick="document.getElementById('id05').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id05" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id05').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('memoria.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Memoria(GB)</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `memoria`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_memoria']?></td>
<td><?php echo $row['memoria']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
	<h3><center>Pantalla</center></h3>
	 <button onclick="document.getElementById('id06').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id06" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id06').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('pantalla.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Pantalla(Pulgadas)</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `pantallas`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_pantalla']?></td>
<td><?php echo $row['pantalla_pulgadas']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
	<h3><center>Office</center></h3>
	 <button onclick="document.getElementById('id07').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id07" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id07').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('office.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Office</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `office`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_office']?></td>
<td><?php echo $row['office']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
	<h3><center>Sistema operativo</center></h3>
	 <button onclick="document.getElementById('id08').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
				 <div id="id08" class="w3-modal">
    			<div class="w3-modal-content w3-animate-top w3-card-4">
    				<header class="w3-container w3-red"> 
       				 <span onclick="document.getElementById('id08').style.display='none'" 
       				 class="w3-button w3-display-topright">&times;</span>
      				  <h2>Ingreso de elementos: </h2>
      				</header>
    				<?php
    					include('sistema_operativo.php');
    				 ?>
    			</div>
    			</div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Sistemas Operativos</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `sistemas_operativos`");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_so']?></td>
<td><?php echo $row['sistema_operativo']?></td>




 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>

<div class="w3-container w3-half">
  <h3><center>Procesadores</center></h3>
   <button onclick="document.getElementById('id08').style.display='block'" class="w3-button w3-block w3-green w3-round-large">Nuevo elementos</button>
         <div id="id08" class="w3-modal">
          <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-red"> 
               <span onclick="document.getElementById('id08').style.display='none'" 
               class="w3-button w3-display-topright">&times;</span>
                <h2>Ingreso de elementos: </h2>
              </header>
            <?php
              include('sistema_operativo.php');
             ?>
          </div>
          </div>
      <div class="w3-responsive w3-border w3-round" id="tabla_scroll">
<table class="w3-table-all w3-card-4 " id="datos">
  <tr class="w3-blue">
  <td><b>Id</b></td>
  <td><b>Procesador</b></td>


</tr>
  <?php
  $resultado_consulta_mysql = mysqli_query($conexion, "SELECT * FROM `procesador");

    while ($row = mysqli_fetch_assoc($resultado_consulta_mysql)){
  ?>
<tr>
<td><?php echo $row['id_procesador']?></td>
<td><?php echo $row['procesador']?></td>



 <tr class='noSearch hide w3-green'>
                <td colspan="7"></td>
            </tr>
<?php } ?>
<br>
</table>
</div>
</div>




</div>
</div>

</div>
</div>
<script src="js/modules.js"></script>
	
 <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>
