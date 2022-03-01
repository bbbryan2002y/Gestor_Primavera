<?php

      include 'conec.php';
      $id=$_REQUEST['id'];
      date_default_timezone_set('America/Bogota');
      
      $resultado = mysqli_query($conexion," SELECT `fecha_creacion` FROM `solicitudes_ti` where consecutivo = '$id'");

       $fila = mysqli_fetch_assoc($resultado);

       
       $hoy = date("Y-m-d H:i:s");

   
    
      
      $cierro = "Ticket Reabierto el ".$hoy;

    
     

     $query="UPDATE `solicitudes_ti` SET `fecha_finalizacion`=CURRENT_TIMESTAMP,`estado`='Reabierto' WHERE consecutivo='$id'";

      $resultado = $conexion->query($query);
      if($resultado){

           $query2="INSERT INTO `bitacora`(`consecutivo`, `nota`) VALUES ('$id','$cierro')";

          $resultado2 = $conexion->query($query2);

          Header("Location: ../solicitudes.php?modifico=si");
          //echo 'ingresado';
      }else {

        echo "error al Actualizar Elemento :/".mysqli_error($conexion);
      }
      
 ?>
