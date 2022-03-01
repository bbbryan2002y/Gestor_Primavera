<?php

    include("conec.php");


      $id=$_REQUEST['id'];

        $query ="DELETE FROM pass WHERE idpass = '$id'";

        $resultado = $conexion->query($query);
        if($resultado){


          Header("Location: ../rutas.php?borro=si");


        }else {

          echo "error al borrar Elemento :/";
        }

      


 ?>
