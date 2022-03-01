<?php 

        $pass1=$_POST['pass'];
        $pass2=$_POST['pass2'];

        if($pass1==$pass2){
        include 'conec.php';
        $id=$_REQUEST['id'];
        $pass=md5($_POST['pass']);

      $query="UPDATE `usuarios` SET pass='$pass' WHERE idusu='$id'";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../usuarios.php?cambiopass=si");

      }else {

        echo "error al Actualizar Elemento :/";
      }



        	   }else {

      
        header("Location: ../cambio_pass.php?error=si");

      }

      

