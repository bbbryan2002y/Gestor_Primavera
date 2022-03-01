<?php

      include 'conec.php';
        $id=$_REQUEST['id'];
        $pro=$_POST['pro'];
        $contac=$_POST['contac'];
        $desc=$_POST['desc'];
        $fijo=$_POST['fijo'];
        $cel=$_POST['cel'];
        $mail=$_POST['mail'];


      $query="UPDATE `directorio_ti` SET `proveedor`='$pro',`contacto`='$contac',`descripcion`='$desc',`tel_fijo`='$fijo',`celular`='$cel',`emails`='$mail' WHERE iddir_ti =$id ";

      $resultado = $conexion->query($query);
      if($resultado){
          Header("Location: ../directorio_ti.php?modifico=si");

      }else {

        echo "error al Actualizar Elemento :/".mysqli_error($conexion);

        echo "<br>".$query;
      }

 ?>

