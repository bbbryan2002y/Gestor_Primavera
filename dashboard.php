<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
  include 'fx/conec.php';

  //nombre de la db
    $sql='SELECT DATABASE()';
    $sqlresult=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_row($sqlresult);
    $active_db=$row[0];

    //peso en kb
    $sql1='SELECT sum(data_length + index_length)/1024  FROM information_schema.TABLES WHERE table_schema="gestor_primavera" GROUP BY table_schema';
    $sqlresult1=mysqli_query($conexion,$sql1);
    $row1=mysqli_fetch_row($sqlresult1);
    $active_db1=$row1[0];

    //numero de tablas
    $sql2='select count(*) from information_schema.tables where table_schema = "gestor_primavera"';
    $sqlresult2=mysqli_query($conexion,$sql2);
    $row2=mysqli_fetch_row($sqlresult2);
    $active_db2=$row2[0];

    //numero de registros 
    $sql3='SELECT SUM(TABLE_ROWS) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "gestor_primavera"';
    $sqlresult3=mysqli_query($conexion,$sql3);
    $row3=mysqli_fetch_row($sqlresult3);
    $active_db3=$row3[0];

    //numero de equipos 

   


 ?>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3/w3.css">
     <link rel="icon" type="image/png" href="img/icon.png">
      <link rel="stylesheet" href="css/w3/w3-colors-2018.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script defer src="/css/fontawesome/js/all.js"></script>
       <script type="text/javascript">
         function confirmation() 
     {
        if(confirm("Desea seguir?"))
  {
     return true;
  }
  else
  {
     return false;
  }
     }

       </script>

  <title>Gestor T.I</title>
</head>
<body class="w3-2018-coconut-milk">
<div class="w3-container w3-2018-nebulas-blue w3-card">
    <div class="w3-row">
  <div class="w3-twothird w3-container">
    
  </div>
  <div class="w3-third w3-container">
    <center>
    <img src="img/logo.png" width="200px">
    </center>
  </div>
</div>
</div>  
<div class="w3-container w3-2018-cherry-tomato">  
    <br>  

</div>  
</div>
  <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:300px;">
    <center>
    <br>
    <h6 class="w3-margin"><b>Bienvenido
      <br>
      <i class="fa fa-user fa-5x" aria-hidden="true"></i>
      <br>
      <span class="w3-tag w3-2018-sailor-blue">
      <?php echo $_SESSION["usuario"];?></b></h6>
      <a href="fx/logout.php" class="w3-button w3-2018-cherry-tomato w3-border w3-round  w3-padding-small " onclick="return confirmation()">Salir</a> 
      <br> 
      <br>
    </center>

  <div class="w3-dropdown-click">
   <button class="w3-button" onclick="myDropFunc2()">
   <i class="fa fa-info-circle" aria-hidden="true"></i>
      Gestion del area
    </button>
    <div id="demoDrop2" class="w3-dropdown-content w3-bar-block w3-white w3-card">
      <a href="solicitudes.php" class="w3-bar-item w3-button">Registro de solicitudes</a>
      <a href="archivos.php" class="w3-bar-item w3-button">Gestion archivos</a>
      <a href="prestamos.php" class="w3-bar-item w3-button">Prestamos de equipos</a>
      <a href="rutas.php" class="w3-bar-item w3-button">Libretas de rutas</a>
      <a href="directorio_ti.php" class="w3-bar-item w3-button">Directorio T.I</a>


    </div>
  </div>
  <div class="w3-dropdown-click">
    <button class="w3-button w3-border" onclick="myDropFunc3()">
      <i class="fa fa-user" aria-hidden="true"></i>
      Administador 
    </button>
    <div id="demoDrop3" class="w3-dropdown-content w3-bar-block w3-white w3-card">
      <a href="usuarios.php" class="w3-bar-item w3-button">Usuarios</a>
      <a href="registrototal.php" class="w3-bar-item w3-button">Registro de usuarios total</a>
    </div>
  </div>

    <div class="w3-dropdown-click">
    <button class="w3-button w3-border" onclick="myDropFunc()">
      <i class="fa fa-check-square-o" aria-hidden="true"></i>
      Inventario T.I. 
    </button>
    <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
      <a href="matriz.php" class="w3-bar-item w3-button">Matriz de inventario</a>
      <a href="admin_inventario.php" class="w3-bar-item w3-button">Maestros de inventario</a>
    </div>
  </div>


</div>

<div class="w3-container" style="margin-left:300px">
  <div class="w3-row">
<h2>Dashboard</h2>
<div class="w3-half w3-container">
<table class="w3-table w3-table-all">
    <tr>
      <th>Informacion de la aplicacion</th>
      <th></th>
    </tr>
    <tr>
      <td>Estado:</td>
      <td>Conectada</td>
    </tr>
    <tr>
      <td>Version de PHP:</td>
      <td><?php echo phpversion(); ?></td>
    </td>
    </tr>
    <tr>
      <td>Version MySQL:</td>
      <td><?php printf(mysqli_get_server_info($conexion)); ?></td>
    </tr>
    <tr>
      <td>IP del servidor:</td>
      <td><?php echo $_SERVER['SERVER_NAME'];?>       
      </td>
    </tr>
    <tr>
      <td>Version del programa:</td>
      <td>1.4.9</td>
    </tr>

</table>
</div>
<div class="w3-half w3-container">
  <table class="w3-table w3-table-all">
    <tr>
      <th>Informacion de la base de datos</th>
      <th></th>
    </tr>
    <tr>
      <td>Estado:</td>
      <td>Conectada</td>
    </tr>
    <tr>
      <td>Nombre de la base de datos:</td>
      <td><?php  echo $active_db; ?></td>
    </tr>
    <tr>
      <td>Tamaño de la base de datos:</td>
      <td><?php  echo $active_db1; ?> Kb</td>
    </tr>
    <tr>
      <td>Numero de tablas:</td>
      <td><?php  echo $active_db2; ?></td>
    </tr>
    <tr>
      <td>Total de registros:</td>
      <td><?php  echo $active_db3; ?></td>
    </tr>

</table>
</div>
<div class="w3-container">
  

</div>



</div>

</div>

<script>


function myDropFunc() {
  var x = document.getElementById("demoDrop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc2() {
  var x = document.getElementById("demoDrop2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc3() {
  var x = document.getElementById("demoDrop3");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc4() {
  var x = document.getElementById("demoDrop4");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc5() {
  var x = document.getElementById("demoDrop5");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
</script>


</body>

 <?php
 } else {
  header("Location: index.php");
}
?>
</html>