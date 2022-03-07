<?php
  //archivo de conexion
  $conexion=new mysqli("localhost","root","","gestor_primavera_pruebas");

      if($conexion){
        /*
        echo "<div class='w3-container w3-green'>";
        echo "<b>";
        echo "Conexion Correcta :D";
        echo "</b>";
        echo "</div>";
        */

      }else{
        echo "<div class='w3-container w3-red'>";
         echo "<b>";
         echo "Error en la conexion :(";
         echo "</b>";
         echo "</div>";
      }

 ?>
