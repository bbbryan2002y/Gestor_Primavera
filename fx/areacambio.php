<?php 

        include 'conec.php';
        $usu=$_POST['usu'];
        $area=$_POST['area'];

      $query="UPDATE `usuarios` SET idarea='$area' WHERE idusu='$usu'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../usuarios.php?cambioarea=si");

      }else {

        echo "error al Actualizar Elemento :/";
      }


