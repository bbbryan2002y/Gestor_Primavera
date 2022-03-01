<?php 
	  include("conec.php");
    session_start();

        $tipo=$_POST['tipo'];       

     $query="INSERT INTO `tipos`( `tipo`) VALUES  ('$tipo')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_tipo=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>