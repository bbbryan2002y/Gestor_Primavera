<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
    ?>

<?php 
  include('includes/adminhead.inc');
  include('fx/conec.php');
 ?>

<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
  <br>
  <div class="w3-row ">
    <div class="w3-container w3-rest w3-center">
      <h3>Cambio de contraseña</h3>
    </div> 
        <?php
        $id= $_REQUEST['id'];
        $usu= $_SESSION["usuario"];
        $query = "select * from usuarios where idusu='$id'";
        $resultado=$conexion->query($query);
        $row=$resultado->fetch_assoc();
        echo "<div class='w3-container'>";
        echo "<h5>";
        echo "<b>";
        echo "ID de elementos:  " ,$id;
        echo "</b>";
        echo "</h5>";
        echo "</div>";
    ?>
      <form action="fx/cambio_usu_pass.php?id=<?php echo $row['idusu'];?>" method="post">
      <div class="w3-container w3-container">  
          <label class="w3-text-blue"><b>Contraseña</b></label>
      <input type="password" name="pass" class="w3-input w3-border" id="pass" required>
          <label class="w3-text-blue"><b>Confirmar Contraseña</b></label>
      <input type="password" name="pass2" class="w3-input w3-border" id="pass2" required>
  
      </div>
      <br>
      <br>
     <div class="w3-container w3-center">
        <br>  
      <input type="submit" class="w3-button w3-block w3-red">
      <br>
      </div>
  </div>
</form>
</div>
</div>
<br>  


<?php
 } else {
  header("Location: index.php");
}
?>
