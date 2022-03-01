<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
    ?>
<!--resto del app-->    
<?php 
  include("includes/head.inc");
  include 'fx/conec.php';
 ?>
     <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/show.js"></script>
    <form>
    <br>
    
   <div class="w3-container">

   <br><br>
   <div class="w3-border w3-pale-blue w3-round-xlarge w3-margin">
    <div class="w3-container w3-margin w3-round-xlarge">
    <h1 class="w3-text-shadow">Medidor de Contraseñas</h1>
    <br>
    <div class="w3-container w3-light-grey w3-card-4">
    
   <div class="w3-container w3-margin">
   <p>
   <h4>
   Con el objetivo de protejer la informacion dejamos esta herramiente para que se pueda saber
   si las contraseñas que se estan usando son seguras de no se seguras aconsejamos cambiarla
   para que una contraseña sea segura el recomendado es que la contraseña supere el 60% de
   nivel de seguridad 
     </h4>
      </p>
       </div>
       </div> 
   <br>
   <h4><b>Algunas recomendaciones</b></h4>
   <ul class="w3-ul w3-border ">
  <li><i class="fa fa-check" aria-hidden="true"></i> La contraseña debe superar minimos 8 caracteres</li>
  <li><i class="fa fa-check" aria-hidden="true"></i> Debe contener mayusculas y minusculas</li>
  <li><i class="fa fa-check" aria-hidden="true"></i> Debe tener Numeros</li>
    <li><i class="fa fa-check" aria-hidden="true"></i> Debe contener carateres como . , * @ entre otros </li>
</ul>
<br>
<H3>Ingresa una contraseña para comprobar su nivel de complegidad</H3>
<label class="w3-label w3-text-blue"><b>Clave:</b></label> 
<input type="password" class="w3-input w3-border w3-round-large" size=15 id="password" name="password" onkeyup="muestra_seguridad_clave(this.value, this.form)"> 
Mostrar contraseña: 
<input type="checkbox"  onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'" name="show" id="show">
<br> <div class="w3-border w3-round-xlarge w3-margin  " >
       <br>
        <label class="w3-label w3-text-blue w3-margin"><b>Seguridad:</b></label> 
     
        <b><input name="seguridad"  class="check" type="text" style="border: 0px; background-color:ffffff; text-decoration:italic;" onfocus="blur()"></b>
        <br>
        <br>
        </div>
        <table class="w3-table-all">
        <tr>
          <th>Nivel de seguridad</th>
          <th>Definicion</th>
          
        </tr>
        <tr class="w3-pale-red">
          <td>0%</td>
          <td>Nula</td>
         
        </tr>
         <tr class="w3-pale-red">
          <td>10%</td>
            <td>Muy debil</td>
        </tr>
         <tr class="w3-pale-red">
          <td >30%</td>
            <td>Debil</td>
        </tr>
         <tr class="w3-pale-red">
          <td>40%</td>
            <td>Parcialmente debil</td>
        </tr>
         <tr class="w3-pale-yellow">
          <td>50%</td>
            <td>Media</td>
        </tr>
         <tr class="w3-pale-yellow">
          <td>60%</td>
            <td>Parcialmente fuerte</td>
        </tr>
         <tr class="w3-pale-green">
          <td>80%</td>
            <td>Fuerte</td>
        </tr>
         <tr class="w3-pale-green">
          <td >100%</td>
            <td>Muy fuerte</td>
        </tr>
</table>
        </div>
       <br>
       <br>
       <br>
        </div>
     <!--La sesion-->
 <?php
} else {
  header("Location: index.php");
}
?>

</body>
</html>
