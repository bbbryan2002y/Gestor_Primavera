<?php 
	  include("conec.php");
    session_start();

        $descripcion=$_POST['descripcion'];
        $ruta=$_POST['ruta'];
        $usu=$_POST['usu'];
        $pass=$_POST['pass'];
        $de=$_SESSION["usuario"];


     

     $query="INSERT INTO `pass`(`nombrepass`, `ruta`, `usu`, `pass`, `passde`) VALUES ('$descripcion','$ruta','$usu','$pass','$de')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../rutas.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/";
      }





 ?>