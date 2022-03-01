<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="img/icon.png">
  <link rel="stylesheet" href="css/w3/w3.css">
  <link rel="stylesheet" href="css/w3/w3-colors-2018.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Gestor T.I</title>
</head>
<body class="w3-blue">
	<!--MENSAJES-->
<!--Para cuando el usuario se salga del sistema-->
    <?php
    if(isset($_GET["logout"])) {
      ?>
      <div class="w3-panel w3-2018-nebulas-blue w3-display-container w3-card w3-margin w3-round-xlarge">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-2018-nebulas-blue w3-large w3-display-topright w3-round-xlarge">&times;</span>
        <p>Sesión cerrada. Hasta Luego</p>
      </div>
      <?php
          }
    ?>
<!--Para cuando el login no es correcto-->
<?php
if(isset($_GET["error"])) {
  ?>
  <div class="w3-panel w3-2018-cherry-tomato w3-display-container w3-card w3-margin w3-round-xlarge">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-2018-cherry-tomato w3-large w3-display-topright w3-round-xlarge">&times;</span>
    <p>Datos de acceso incorrector. Por favor verifique la informacion</p>
  </div>
  <?php
      }
?>
    <!--FIN MENSAJES-->
    <br><br><br>
    <div class="w3-row">
    <div class="w3-col" style="width:15%"><p></p></div>
    <div class="w3-col" style="width:70%">
      <div class="w3-card">
    <div class="w3-container w3-2018-nebulas-blue">
    <div class="w3-container w3-margin w3-center">
    <h3><b>Gestor T.I </b></h3>
    </div>

        </div>     
      <div class="w3-container w3-2018-coconut-milk">
        <div class="w3-center"> 
       <br>
        </div>
        <br>
	     <form action="fx/login.php" method="post" >
		      <div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="usu" type="text" placeholder="Nombre de usuario">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="pass" type="password" placeholder="Contraseña">
    </div>
</div>
		      <br>
		      <input type="submit" class="w3-button w3-block w3-2018-cherry-tomato">
          <br>
	     </form>
       <br>
     </div>
     </div>
       </div>
       <div class="w3-col" style="width:15%"><p></p></div>
    </div>
</body>
</html>