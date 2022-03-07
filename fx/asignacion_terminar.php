<?php
include "conec.php";

$id_asignacio  = $_GET["id"];

    $datos = mysqli_query($conexion, "SELECT * FROM `asignacion_equipos` WHERE id_asignacion = 2;");
    $resultado = mysqli_fetch_assoc($datos);

    $consecutivo = $resultado["consecutivo"];
    $fecha_entrega = date('Y-m-d');
    $estado = 1;

   $terminar =  "UPDATE `asignacion_equipos` SET`fecha_entrega`='$fecha_entrega',`estado_asignacion`='$estado' WHERE 2";
   $resultado1 = $conexion->query($terminar);

   if($resultado1){
    echo "Elemento Insertado";
    header("Location: ../hoja_vida/hoja_vida.php?id=$consecutivo"); 
 exit();
    }else {

        echo "error al ingresar Elemento :/". mysqli_error($conexion);
    }
