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
      <h3>Modificacion de usuario</h3>
    </div> 
        <?php
        $id= $_REQUEST['id'];
        if ($id !='1'){
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
      <form action="fx/modificarusu.php?id=<?php echo $row['idusu'];?>" method="post">
      <div class="w3-rest w3-container">  
      <label class="w3-text-blue"><b>Nombre usuario</b></label>
      <input type="text" name="usu" class="w3-input w3-border" value="<?php echo $row['usu'];?>" required>
       <label class="w3-text-blue"><b>Nombre Completo</b></label>
      <input type="text" name="nombre" class="w3-input w3-border" value="<?php echo $row['nombre_completo'];?>" required>
      
      <label class="w3-text-blue"><b>Cargo</b></label>
      <input type="text" name="cargo" class="w3-input w3-border" value="<?php echo $row['cargo'];?>" required>
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
  }else{
   header("Location: usuarios.php?modroot=si");
  }
 } else {
  header("Location: index.php");
}
?>
