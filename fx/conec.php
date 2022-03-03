<?php
  //archivo de conexion
  $conexion=new mysqli("192.168.101.77","root","Super4825*","gestor_primavera_pruebas");

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
