<?php 
	  include("conec.php");
        session_start();

        $consecutivo = $_POST["consecutivo"];
        $fecha_manteniento = $_POST["fecha_Mantenimiento"];
        $nombre_ejecuta  = $_POST["nombre_ejecuta"];
        $observacion = $_POST["observacion_mantenimeinto"];

        // echo($consecutivo);

        $query = "INSERT INTO `mantenimientos`(`consecutivo`, `fecha`, `nombre_quien_ejecuta`, `observaciones`) 
                   VALUES ('$consecutivo','$fecha_manteniento','$nombre_ejecuta','$observacion')";


        $resultado = $conexion->query($query);
        if($resultado){
        echo "Elemento Insertado";
        header("Location: ../hoja_vida/hoja_vida.php?id=$consecutivo");
        }else {

            echo "error al ingresar Elemento :/". mysqli_error($conexion);
        }




