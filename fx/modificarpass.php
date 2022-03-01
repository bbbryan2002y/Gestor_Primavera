<?php

      include 'conec.php';
        $id=$_REQUEST['id'];
        $descripcion=$_POST['descripcion'];
        $ruta=$_POST['ruta'];
        $usu=$_POST['usu'];
        $pass=$_POST['pass'];


      $query="UPDATE pass SET usu='$usu',pass='$pass' ,ruta='$ruta' ,nombrepass='$descripcion' WHERE idpass='$id'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../rutas.php?modifico=si");

      }else {

        echo "error al Actualizar Elemento :/";
      }

 ?>
