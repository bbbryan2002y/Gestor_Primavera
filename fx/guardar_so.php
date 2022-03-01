<?php 
	  include("conec.php");
    session_start();

        $so=$_POST['so'];       

     $query="INSERT INTO `sistemas_operativos`( `sistema_operativo`) VALUES  ('$so')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_so=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>