<?php 
	  include("conec.php");
    session_start();

        $pantalla=$_POST['pantalla'];       

     $query="INSERT INTO `pantallas`(`pantalla_pulgadas`) VALUES ('$pantalla')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_disco=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>