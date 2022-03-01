<?php 
require("conec.php");

	$nom_usu = $_POST["nom_usu"];
	$desc = $_POST["desc"];
	$marca = $_POST["marca"];
	$estado_e = $_POST["estado_e"];

	$query=" INSERT INTO `prestamo_equipos`(`nombre_usuario`, `descripcion`, `marca`, `estado_e`,`estado_d`, `devuelto`) VALUES  ('$nom_usu','$desc','$marca','$estado_e','No se ha devuelto','No')";
     $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../prestamos.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }   





 ?>