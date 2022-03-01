<?php

      include 'conec.php';
        $id=$_REQUEST['id'];
        $persona=$_POST['persona'];


      $query="UPDATE `matriz_inventario` SET `usuario`='$persona' WHERE `id_matriz` = '$id'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../matriz.php?modifico=si");

      }else {

        echo "error al Actualizar Elemento :/";
      }

 ?>
