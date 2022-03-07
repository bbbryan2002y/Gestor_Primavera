<?php
    include("conec.php");
    session_start();
    
    $consecutivo = $_POST["consecutivo"];
    $fecha_asignacion = $_POST["fecha_asignacion"];
    $nombre_recibe = $_POST["nombre_recibe"];
    $query1 = "SELECT * FROM `personas` WHERE id_personas = $nombre_recibe";
    $dato = mysqli_query($conexion,$query1);
    $datos  = mysqli_fetch_assoc($dato);

    $area = $datos["id_area"];
    $cargo = $datos["id_cargo"];
    $estado = 0;


      $query  =  "INSERT INTO `asignacion_equipos`(`consecutivo`, `fecha_recibe`, `nombre_p`,`area`, `cargo`, `estado_asignacion`) 
                                    VALUES ('$consecutivo', '$fecha_asignacion', '$nombre_recibe','$area','$cargo', '$estado'  )";
       $resultado3 = $conexion->query($query);
       if($resultado3){
       echo "Elemento Insertado";
       header("Location: ../hoja_vida/hoja_vida.php?id=$consecutivo"); 
    exit();
       }else {

           echo "error al ingresar Elemento :/". mysqli_error($conexion);
       }

                    
?>