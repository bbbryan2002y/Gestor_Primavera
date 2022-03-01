<?php
include("conec.php");

    $loginNombre = $_POST["usu"];
    $loginPassword = md5($_POST["pass"]);

    $consulta = "SELECT * FROM usuarios WHERE usu='$loginNombre' AND pass='$loginPassword'";

    if($resultado = $conexion->query($consulta)) {
      while($row = $resultado->fetch_array()) {

        $userok = $row["usu"];
        $passok = $row["pass"];
      }
      $resultado->close();
    }



    if(isset($loginNombre) && isset($loginPassword)) {

      if($loginNombre == $userok && $loginPassword == $passok) {

        $query="INSERT INTO `regingreso`(`regusu`) VALUES ('$userok')";
        $resultado2 = $conexion->query($query);

        session_start();
        $_SESSION["logueado"] = TRUE;
        $_SESSION["usuario"] = $userok;
        header("Location: ../dashboard.php");

      }
      else {
        Header("Location: ../index.php?error=si");



      }
      $resultado2->close();
      $conexion->close();

    }



?>
