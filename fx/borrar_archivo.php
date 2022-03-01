<?php
include("conec.php");
// Usamos el comando "unlink" para borrar el fichero
$archivo = $_GET["name"];
$paraborrar = '../uploads/'.$archivo;
echo $paraborrar;
 $query ="DELETE FROM archivos WHERE nombre = '$archivo'";

        $resultado = $conexion->query($query);
        if($resultado){
          unlink($paraborrar);
          Header("Location: ../archivos.php?borro=si");


        }else {

          echo "error al borrar Elemento :/";
        }

?>