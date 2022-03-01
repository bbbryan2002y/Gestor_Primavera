<?php

      include 'conec.php';
        $id=$_REQUEST['id'];
        $usu=$_POST['usu'];
        $nombre=$_POST['nombre'];
        $cargo=$_POST['cargo'];



      $query="UPDATE `usuarios` SET usu='$usu', nombre_completo= '$nombre', cargo= '$cargo' WHERE idusu='$id'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../usuarios.php?modifico=si");

      }else {

        echo "error al Actualizar Elemento :/";
      }

 ?>
