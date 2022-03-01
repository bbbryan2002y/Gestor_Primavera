<?php 
	  include("conec.php");
    session_start();

        $pro=$_POST['provedor'];
        $contacto=$_POST['contacto'];
        $desc=$_POST['desc'];
        $telf=$_POST['telf'];
        $cel=$_POST['cel'];
        $mail=$_POST['mail'];

     $query="INSERT INTO `directorio_ti`(`proveedor`, `contacto`, `descripcion`, `tel_fijo`, `celular`, `emails`) VALUES ('$pro','$contacto','$desc','$telf','$cel','$mail')";

      $resultado = $conexion->query($query);
      if($resultado){
        echo "Elemento Insertado";
        header("Location: ../directorio_ti.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }





 ?>