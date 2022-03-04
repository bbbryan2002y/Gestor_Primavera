<?php
    include "hoja_vida.php";

?>

<!-- ASIGNACION INICIO-->
    <div class="modal fade" id="asignacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asignacion" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="asignacion">AGREGAR ASIGNACION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <!-- Fecha de asignacion -->
                        <div class="container">
                            <label for="fecha" class="form-label"><b>Fecha de Asignacion</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <!-- Nombre -->
                        <div class="container">
                            <label for="nombres" class="form-label"><b>Nombre</label>
                            <select class="form-select form-select-sm" name="">
                                <?php
                                    // Consuta para agregar user
                                    $resultado1= mysqli_query($conexion, "SELECT * from personas WHERE estado = 1  ORDER BY nombres ASC");  // Estado = 1 Activo";
                                    print_r($resultado1);
                                    while($rows = mysqli_fetch_assoc($resultado1)){
                                ?>
                                    <option value="<?php echo $rows['id_personas']?>"><?php echo $rows['nombres']?></option>
                                <?php       
                                    }                       
                                ?>
                            </select>
                        </div>
                        <!-- <div class="container">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <select class="form-select form-select-sm" name="">
                                <?php
                                    // Consuta para agregar user
                                    $resultado1= mysqli_query($conexion, "SELECT * from personas WHERE estado = 1  ORDER BY nombres ASC");  // Estado = 1 Activo";
                                    print_r($resultado1);
                                    while($rows = mysqli_fetch_assoc($resultado1)){
                                ?>
                                    <option value="<?php echo $rows['id_personas']?>"><?php echo $rows['nombres']?></option>
                                <?php       
                                    }                       
                                ?>
                            </select>
                        </div> -->
                        <br>
                        <div class=" container d-grid gap-2 d-md-block">
                            <button class=" container btn btn-primary" type="button">ENVIAR</button>
                        </div>
                        <br>
                    </form>         
                </div>
            </div>
        </div>
        <!-- ASIGNACION FIN-->

        <!-- ---- -->
<!-- MANTENIMIENTO INICIO-->
        <div class="modal fade" id="mantenimeinto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mantenimeinto" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mantenimeinto">AGREGAR MANTENIMIENTO</h5>
                       
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../fx/mantenimentos.php" method="post">
                        <!-- Fecha de asignacion -->
                        <p><?php echo($consecutivo);?></p>
                        <div class="container">
                            <label for="fecha" class="form-label"><b>Fecha del Mantenimeinto</b></label>
                            <input type="date" class="form-control" name="fecha_Mantenimiento" id="fecha_Mantenimiento">
                        </div>
                        <!-- Nombre -->
                        <div class="container">
                            <label for="nombres_ejecuta" class="form-label"><b>Nombre Quien Ejecuta</label>
                            <select class="form-select form-select-sm" name="nombre_ejecuta">
                                <?php
                                    // Consuta para agregar user
                                    $resultado1= mysqli_query($conexion, "SELECT * from personas WHERE estado = 1 AND id_area = 1 ORDER BY nombres ASC");  // Estado = 1 Activo";
                                    print_r($resultado1);
                                    while($rows = mysqli_fetch_assoc($resultado1)){
                                ?>
                                    <option value="<?php echo $rows['id_personas']?>"><?php echo $rows['nombres']?></option>
                                <?php       
                                    }                       
                                ?>
                            </select>
                        </div>
                        <!-- OBSERVACION INICIO-->
                        <div class="container">
                            <label for="observacion_mantenimeinto" class="form-label"><b>Observaciones</label>
                            <textarea class="form-control" name="observacion_mantenimeinto" id="observacion_mantenimeinto" rows="3"></textarea>
                        </div>
                        <!-- OBSERVACION FIN-->
                        <br>
                        <div class=" container d-grid gap-2 d-md-block">
                            <button class=" container btn btn-primary" type="submit">ENVIAR</button>
                        </div>
                        <br>
                    </form>         
                </div>
            </div>
        </div>
<!-- MANTENIMIENTO FIN-->
        