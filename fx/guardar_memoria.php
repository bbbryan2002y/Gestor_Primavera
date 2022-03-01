<?php 
	  include("conec.php");
    session_start();

        $memoria=$_POST['memoria'];       

     $query="INSERT INTO `memoria`(`memoria`) VALUES  ('$memoria')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_memoria=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>