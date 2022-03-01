<?php

      include 'conec.php';
        $id=$_REQUEST['id'];
        $descripcion=$_POST['estado_e'];


      $query="UPDATE `prestamo_equipos` SET `fecha_h_dev`=CURRENT_TIMESTAMP,`estado_d`='$descripcion',`devuelto`='Si' WHERE idprestamo='$id'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../prestamos.php?modifico=si");

      }else {

        echo "error al Actualizar Elemento :/".mysqli_error($conexion);
      }

 ?>
