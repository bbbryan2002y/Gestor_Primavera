<?php

    include("conec.php");


      $id=$_REQUEST['id'];

        $query ="DELETE FROM directorio_ti WHERE iddir_ti  = '$id'";

        $resultado = $conexion->query($query);
        if($resultado){


          Header("Location: ../directorio_ti.php?borro=si");


        }else {

          echo "error al borrar Elemento :/";
        }

      


 ?>
