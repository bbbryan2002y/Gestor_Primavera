<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
    ?>

<?php 
  include('includes/head.inc');
  include('fx/conec.php');
 ?>

<div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
<div class="w3-container">
  <br>
  <div class="w3-row ">
    <div class="w3-container w3-rest w3-center">
      <h3>Reasignar Equipo</h3>
    </div> 
        <?php
        $id= $_REQUEST['id'];
        $query = "SELECT * FROM `matriz_inventario` where id_matriz='$id'";
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
      <form action="fx/reasignar_equipo.php?id=<?php echo $row['id_matriz'];?>" method="post">
        <div class="w3-container w3-rest">
           <label class="w3-text-blue"><b>Asignar a: </b></label>
      <select class="w3-select w3-border" name="persona">
        <?php  $resultado_area = mysqli_query($conexion, "SELECT * FROM `personas`");
          while ($rows = mysqli_fetch_assoc($resultado_area)){          
          ?> 
         
        <option value="<?php echo $rows['nombres']?> "><?php echo $rows['nombres']?></option>
      <?php } ?>
      </select>
        </div>
        <br>
        <input type="submit" class="w3-button w3-block w3-red">
        <br>
      </form>
</div>
</div>
<br>  


<?php
 } else {
  header("Location: index.php");
}
?>
