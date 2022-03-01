<!-- Modal INICIO-->
<div class="modal fade" id="asignacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asignacion" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="asignacion">AGREGAR REGISTRO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <!-- Fecha de asignacion -->
                        <div class="container">
                            <label for="fecha" class="form-label">Fecha de Asignacion</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <!-- Nombre -->
                        <div class="container">
                            <label for="nombres" class="form-label">Nombre</label>
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
                        <div class="container">
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
                        </div>
                        <br>
                        <div class=" container d-grid gap-2 d-md-block">
                            <button class=" container btn btn-primary" type="button">ENVIAR</button>
                        </div>
                        <br>
                    </form>         
                </div>
            </div>
        </div>
        <!-- Modal FIN-->