<?php

    include("conec.php");


      $id=$_REQUEST['id'];
      	 if ($id !='1'){
        $query ="DELETE FROM usuarios WHERE idusu = '$id'";

        $resultado = $conexion->query($query);
        if($resultado){


          Header("Location: ../usuarios.php?borro=si");


        }else {

          echo "error al borrar Elemento :/";
        }
    }else{
    	 Header("Location: ../usuarios.php?eroot=si");
    }
      


 ?>
    }
