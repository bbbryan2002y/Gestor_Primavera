<?php 
	  include("conec.php");
        session_start();

        $consecutivo = $_POST[""]
        $fecha_manteniento = $_POST["fecha_Mantenimiento"];
        $nombre = $_POST["nombre_ejecuta"];
        $observacion = $_POST["observacion_mantenimeinto"];

        $query = "INSERT INTO `mantenimientos`(`id_mantenimento`, `consecutivo`, `fecha`, `nombre_equien_ejecuta`, `observaciones`) 
                  VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])";


    //   $resultado = $conexion->query($query);
    //   if($resultado){
    //     echo "Elemento Insertado";
    //     header("Location: ../admin_inventario.php?creo=si");
    //   }else {

    //     echo "error al ingresar Elemento :/". mysqli_error($conexion);
    //   }




