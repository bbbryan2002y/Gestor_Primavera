<?php 
	  include("conec.php");
    session_start();

        $disco=$_POST['disco_gb'];       

     $query="INSERT INTO `disco`(`disco_gb`) VALUES ('$disco')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_disco=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>