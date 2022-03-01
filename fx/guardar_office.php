<?php 
	  include("conec.php");
    session_start();

        $office=$_POST['office'];       

     $query="INSERT INTO `office`( `office`) VALUES  ('$office')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_office=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>