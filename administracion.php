<?php
include 'fx/conec.php';
	session_start();
	  //saber area
	$de = $_SESSION["usuario"];
	$areaquery="SELECT `idarea` FROM `usuarios` WHERE `usu` ='$de' ";
	$arearow=mysqli_query($conexion,$areaquery);

    while ($row = mysqli_fetch_assoc($arearow)){
		$area=$row['idarea'];
	}
	//fin area
	if($_SESSION["logueado"] == TRUE && $area==1 )  {
		?>
<!--resto del app-->		
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3/w3.css">
  		<link rel="stylesheet" href="css/w3/w3-colors-2018.css">
  		<link href="/css/fontawesome/css/all.css" rel="stylesheet">
  		 <script defer src="/css/fontawesome/js/all.js"></script>
	<title>Inicio</title>
</head>
<body class="w3-2018-coconut-milk">
<div class="w3-container w3-2018-nebulas-blue w3-card">
		<div class="w3-container W3-center">
			<br>
		<h3><b>Gestor de area T.I Primavera</b></h3>
		<br>			
	</div>
</div>	
<div class="w3-container w3-2018-cherry-tomato">	
		<br>	
	</div>
	<div class="w3-sidebar w3-bar-block w3-card-4" style="width:45%">
	<h5 class="w3-margin"><b>Administrador</b></h5>
  <a href="usuarios.php" class="w3-bar-item w3-button w3-hover-blue w3-border-top w3-border-bottom w3-table w3-2018-nebulas-blue"><b>Listado de usuarios</b></a>
  <a href="registrototal.php" class="w3-bar-item w3-button w3-hover-blue w3-border-top w3-border-bottom w3-table w3-2018-nebulas-blue"><b>Registro de ingresos</b></a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-hover-blue w3-border-top w3-border-bottom w3-table w3-2018-nebulas-blue"><b>Volver</b></a>

  	</div>

</body>
 <?php
 } else {
  header("Location: dashboard.php?ingreso=si");
}
?>
