<?php 
	  
    session_start();
    include("conec.php");
    date_default_timezone_set('America/Bogota');
        $quien = $_SESSION["usuario"];
        $desc_sol=$_POST['desc_sol'];
        $tipos=$_POST['tipos'];
        $solicitante=$_POST['solicitante'];
        $motivo=$_POST['motivo'];
        $hoy = date("Y-m-d H:i:s");

        $cierro = "Ticket Iniciado el ".$hoy;
       
      
      $resultado = mysqli_query($conexion, "SELECT MAX(id_solicitud) AS 'id' from solicitudes_ti order by id_solicitud desc limit 1");
      $fila = mysqli_fetch_assoc($resultado);

       $cn = $fila['id'];
       $xd;
  

       if(isset($cn)){
          $xd = $cn+1;
       }else{
        $xd = 1;
       }
      $cons = "TK-".str_pad($xd, 6, '0', STR_PAD_LEFT);

      //echo $cons;

     $query="INSERT INTO `solicitudes_ti`(`consecutivo`,`creado`, `desc_solicitud`, `tipo`, `solicitante`, `motivo`, `estado`, `dias_transcurridos`) VALUES ('$cons','$quien','$desc_sol','$tipos','$solicitante','$motivo','Nuevo','0')";

      $resultado = $conexion->query($query);
      if($resultado){
        $query2="INSERT INTO `bitacora`(`consecutivo`, `nota`) VALUES ('$cons','$cierro')";

          $resultado2 = $conexion->query($query2);
        header("Location: ../solicitudes.php?creo=si");
      }else {

        echo "error al ingresar Elemento :/".mysqli_error($conexion);
      }





 ?>