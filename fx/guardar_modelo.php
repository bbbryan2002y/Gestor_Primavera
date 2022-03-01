<?php 
	  include("conec.php");
    session_start();

        $marca=$_POST['marca'];  
        $modelo=$_POST['modelo'];      

     $query="INSERT INTO `modelo`( `id_marca`, `MODELO`)  VALUES  ('$marca','$modelo')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo_modelo=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }

 ?>