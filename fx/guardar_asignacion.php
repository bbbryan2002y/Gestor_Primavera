<?php 
	  include("conec.php");
    session_start();

        $area=$_POST['area'];
        $usu=$_POST['persona'];
        $tipo=$_POST['tipos'];
        $equipo=$_POST['equipo'];
        $observaciones=$_POST['observaciones'];

//AQUI OBTENGO LOS DATOS PARA INGRESARLOS EN LA MATRIZ APARTIR DE LA HOJA DE VIDA 
        $query_hoja ="SELECT * FROM `hoja_de_vida_equipos` where id_hoja_de_vida = $equipo";
        $resultado_hoja=$conexion->query($query_hoja);
        $fila_hoja=$resultado_hoja->fetch_assoc();
        $serial =$fila_hoja['serial'];
        $fecha_ad =$fila_hoja['fecha_adquisicion'];
        $marca=$fila_hoja['id_marca'];
        $modelo=$fila_hoja['id_modelo'];
        $nombre_e=$fila_hoja['nombre_equipo'];
        $disco_d=$fila_hoja['id_disco'];
        $id_memoria=$fila_hoja['id_memoria'];
        $procesador=$fila_hoja['id_procesador'];
        $mac=$fila_hoja['direccion_mac'];
        $pantalla=$fila_hoja['id_pantalla'];
        $office=$fila_hoja['id_office'];
        $so=$fila_hoja['id_so'];
        $costos=$fila_hoja['costo'];

//ASIGNACION DEL CARGO

$query_cargo ="SELECT `id_personas`, `nombres`, cargos.cargo as cargos_empresa FROM `personas` INNER JOIN cargos on personas.id_cargo = cargos.id_cargo where id_personas = $usu";
$resultado_cargo=$conexion->query($query_cargo);
$fila_cargo =$resultado_cargo->fetch_assoc();
$cargo=$fila_cargo['cargos_empresa'];
$nombre_persona=$fila_cargo['nombres'];



//AQUI HAGO LA SUMATORIA DE CONSECUTIVO ANTERIOS
        $query = "SELECT * FROM matriz_inventario ORDER by `id_matriz` DESC LIMIT 1";
        $resultado=$conexion->query($query);
        $row=$resultado->fetch_assoc();
        $con=$row['consecutivo'];
        $cons1 = substr($con, -3);
        $sum = $cons1+1;
        $cons2 = "TEI-AAF-";
        $consecutivo = $cons2.$sum;

     /* echo "AREA: ".$area;
      echo "<br>";
      echo "CARGO: ".$cargo;
      echo "<br>";
      echo "TIPO: ".$tipo;
      echo "<br>";
      echo "EQUIPO: ".$equipo;
      echo "<br>";
      echo "OBSERVACIONES: ".$observaciones;
      echo "<br>";
      echo "SERIAL: ".$serial;
      echo "<br>";
      echo "FECHA ADQUISICION: ".$fecha_ad;
      echo "<br>";
      echo "MARCA: ".$marca;
      echo "<br>";
      echo "Modelo: ".$modelo;
      echo "<br>";
      echo "NOMBRE DEL EQUIPO: ".$nombre_e;
      echo "<br>";
      echo "DISCO DURO: ".$disco_d;
      echo "<br>";
      echo "MEMORIA RAM: ".$id_memoria;
      echo "<br>";
      echo "PROCESADOR: ".$procesador;
      echo "<br>";
      echo "DIRECCION MAC: ".$mac;
      echo "<br>";
      echo "PANTALLA: ".$pantalla;
      echo "<br>";
      echo "OFFICE: ".$office;
      echo "<br>";
      echo "SISTEMA OPERATIVO: ".$so;
      echo "<br>";
      echo "COSTOS: ".$costos;
      echo "<br>";
      echo "NOMBRE DE LA PERSONA: ".$nombre_persona;
      echo "<br>";
      echo "CONSECUTIVO:".$consecutivo;
    */

     $query="INSERT INTO `matriz_inventario`(`consecutivo`, `usuario`, `cargo`, `idarea`, `fecha_adquisicion`, `id_tipo`, `serial_imei`, `id_marca`, `id_modelo`, `nombre_equipo`, `id_disco`, `id_memoria`, `id_procesador`, `direccion_mac`, `id_pantalla`, `id_office`, `id_so`, `costo`, `OBSERVACIONES`, `disponible`) VALUES  ('$consecutivo','$nombre_persona','$cargo','$area','$fecha_ad','$tipo','$serial','$marca','$modelo','$nombre_e','$disco_d','$id_memoria', $procesador,'$mac','$pantalla','$office','$so','$costos','$observaciones','Si')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../matriz.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/". mysqli_error($conexion);
      }



      





 ?>