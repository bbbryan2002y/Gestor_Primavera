<?php
include("conec.php");
session_start();
$de=$_SESSION["usuario"];
//saber area
$areaquery="SELECT `idarea` FROM `usuarios` WHERE `usu` ='$de' ";
$arearow=mysqli_query($conexion,$areaquery);

    while ($row = mysqli_fetch_assoc($arearow)){
		$area=$row['idarea'];
	}
	//fin area
$target_path = "../uploads/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$nombre= $_FILES['uploadedfile']['name'];
$ruta= $target_path;
$tamano = $_FILES['uploadedfile']['size'];
$tipo = $_FILES['uploadedfile']['type'];

 //guardar  en base de datos ruta
     $query="INSERT INTO `archivos`( `nombre`, `ruta`, `tipo`, `tamano`, `subido_por`, `idarea`) values ('$nombre','$ruta','$tipo','$tamano','$de','$area')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {


   
             header("Location: ../archivos.php?creo=si");
} else{
    echo "Ha ocurrido un error, trate de nuevo!";
}

      }else {

        echo("Error al ingresar elemento :/ " . mysqli_error($conexion));
      }


?>