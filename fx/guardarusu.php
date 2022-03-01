<?php 

        $pass1=$_POST['pass'];
        $pass2=$_POST['pass2'];

        if($pass1==$pass2){

	      include("conec.php");


        $usu=$_POST['usu'];
        $pass=md5($_POST['pass']);
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $cargo=$_POST['cargo'];
        $area=$_POST['area'];
      
      $query="INSERT INTO `usuarios`(`usu`, `pass`,`nombre_completo`, `cargo`, `idarea`) values ('$usu','$pass','$nombre','$cargo' , '1')";

      $resultado = $conexion->query($query);
      if($resultado){
        header("Location: ../usuarios.php?creo=si");
      }else {

      
        echo("Error al ingresar elemento :/ " . mysqli_error($conexion));

      }

       }else {

      
        header("Location: ../usuarios.php?error=si");

      }

      




 ?>