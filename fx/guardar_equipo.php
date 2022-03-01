<?php 
	  include("conec.php");
    session_start();

       
        $modelo=$_POST['modelo'];
        $tipos=$_POST['tipos'];
        $marca=$_POST['marca'];
        $disco_d=$_POST["disco_d"];
        $fecha_ad=$_POST["fecha_ad"];
        $procesador=$_POST["procesador"];
        $pantalla=$_POST["pantalla"];
        $office=$_POST["office"];
        $serial=$_POST["serial"];
        $nombre_e=$_POST["nombre_e"];
        $memoria=$_POST["memoria"];
        $mac=$_POST["mac"];
        $so=$_POST["so"];
        $costos=$_POST["costos"];


     $query="INSERT INTO `hoja_de_vida_equipos`(`serial`, `id_tipo`, `fecha_adquisicion`, `id_marca`, `id_modelo`, `nombre_equipo`, `id_disco`, `id_memoria`, `id_procesador`, `direccion_mac`, `id_pantalla`, `id_office`, `id_so`, `costo`) VALUES('$serial','$tipos','$fecha_ad','$marca','$modelo','$nombre_e','$disco_d','$memoria','$procesador','$mac','$pantalla','$office','$so','$costos')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../admin_inventario.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/". mysqli_error($conexion);
      }





 ?>