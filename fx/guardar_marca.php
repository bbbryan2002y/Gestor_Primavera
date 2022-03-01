<?php 
	  include("conec.php");
    session_start();

        $marca=$_POST['marca'];       

     $query="INSERT INTO `marcas`(`marca`) VALUES  ('$marca')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_marca=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>