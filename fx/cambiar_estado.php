<?php

    include("conec.php");


      $id=$_REQUEST['id'];
      $query_estado ="SELECT `disponible` FROM `matriz_inventario` where `id_matriz` = '$id'";
      $resultado_estado =$conexion->query($query_estado);
      $fila_estado =$resultado_estado->fetch_assoc();
      $estado=$fila_estado['disponible'];
      echo $estado;
      echo "<br>";

       
      	if($estado=='Si'){
      		//echo "Dijo si y cambio a no";

       $query ="UPDATE `matriz_inventario` SET `disponible` = 'No' WHERE `id_matriz`  = '$id'";

        $resultado = $conexion->query($query);
        if($resultado){


          Header("Location: ../matriz.php?cambio=si");


        }else {

          echo "error al cambiar Elemento :/";
        }

      }else{
      	//echo "Dijo no y cambio a si";
      	 $query ="UPDATE `matriz_inventario` SET `disponible` = 'Si' WHERE `id_matriz`  = '$id'";

        $resultado = $conexion->query($query);
        if($resultado){


          Header("Location: ../matriz.php?cambio=si");


        }else {

          echo "error al cambiar Elemento :/";
        }
        
      }


 ?>
