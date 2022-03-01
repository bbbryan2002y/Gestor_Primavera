<?php 
 include("conec.php");
	$id= $_REQUEST['id'];
	$nota=$_POST['nota'];  

	echo $id."</br>".$nota;

	 $query="INSERT INTO `bitacora`(`consecutivo`, `nota`) VALUES ('$id','$nota')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../solicitudes.php?nota=si");
      }else {

        echo "error al ingresar Elemento :/". mysqli_error($conexion);
      }


 ?>