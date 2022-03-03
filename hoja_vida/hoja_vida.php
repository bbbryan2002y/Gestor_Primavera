<?php
    include ("../fx/conec.php");
    $id = $_GET['id'];  

    $informacion ="SELECT `id_matriz`, 
                    `consecutivo`, 
                    personas.`nombres`, 
                    cargos.`cargo`, 
                    areas.nombre_area,
                    `fecha_adquisicion`, 
                    tipos.tipo, 
                    `serial_imei`, 
                    marcas2.marca,
                    modelo.MODELO, 
                    `nombre_equipo`, 
                    disco.disco_gb, 
                    memoria.memoria, 
                    procesador.procesador, 
                    `direccion_mac`, 
                    pantallas.pantalla_pulgadas, 
                    marcas1.marca_monitor,
                    `serial_monitor`,
                    `mouse`,
                    `teclado`,
                    `otro`,
                    `erp`,
                    `antivirus`,
                    office.office,
                    `licencia_office`,
                    sistemas_operativos.sistema_operativo,
                    `licencia_SO`,
                    `costo`,
                    `OBSERVACIONES` 
                FROM `matriz_inventario` 
                INNER JOIN personas on matriz_inventario.persona = personas.id_personas
                INNER JOIN cargos on matriz_inventario.cargo = cargos.id_cargo
                INNER JOIN areas on matriz_inventario.idarea = areas.idarea
                INNER JOIN tipos on matriz_inventario.id_tipo = tipos.id_tipo
                INNER JOIN marcas as marcas2 on matriz_inventario.id_marca = marcas2.id_marca
                INNER JOIN marcas as marcas1 on matriz_inventario.marca_monitor = marcas1.id_marca
                INNER JOIN modelo on matriz_inventario.id_modelo = modelo.id_modelo
                INNER JOIN disco on matriz_inventario.id_disco = disco.id_disco
                INNER JOIN memoria on matriz_inventario.id_memoria = memoria.id_memoria
                INNER JOIN procesador on matriz_inventario.id_procesador = procesador.id_procesador
                INNER JOIN pantallas on matriz_inventario.id_pantalla = pantallas.id_pantalla
                INNER JOIN office on matriz_inventario.id_office = office.id_office
                INNER JOIN sistemas_operativos on matriz_inventario.id_so = sistemas_operativos.id_so
                    WHERE id_matriz = $id";  

    $resultado = mysqli_query($conexion, $informacion);
    $dato = mysqli_fetch_assoc($resultado);   
    // print_r($dato);
    
    $consecutivo = $dato["consecutivo"];
?>

<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link -->
    
    <link rel="stylesheet" href="hoja_vida.css">

    <link rel="shortcut icon" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>HOJA DE VIDA: <?php  echo $dato["consecutivo"];?></title>
</head>
<body>

<div class = "container">
        <!-- CABEZERA -->
        <br>
        <Table class = " container border">
            <tbody>
                <tr class="border border-dark">
                    <th class="border border-dark" style="width: 10rem;">
                        <div class="container">
                            <img class = "" 
                            src="../img/logo2.png" alt="">
                        </div>
                    </th>

                    <th class = "align-middle text-center" colspan="2" ><B> HOJA DE VIDA DE EQUIPOS DE TECNOLOGÍA </B></th>
                    <th>
                        <table class = "container border border-dark" >
                            <tr >
                                <th class = "text-center border border border-dark" >Codigo: </th>
                                <td class = "text-center border border border-dark" >TEI-FT-003</td>
                            </tr>
                            <tr >
                                <th class = "text-center border border border-dark">Version:</th>
                                <th class = "text-center border border border-dark">001</th>
                            </tr>
                            <tr >
                                <th class = "text-center border border-dark " colspan="2" >Pagina 1 de 1</th>
                            </tr>
                        </table>
                    </th>
                </tr>
            </tbody>
        </Table>
        <!-- CABEZERA FIN -->
                <br>
                <!-- Informacion INICIO-->
                <div >
                    <table class="container  border"> 
                        <thead>
                            <tr class = "" style="background-color:#BDBDBD;">
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">ACTIVO FIJO</th>
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">TIPO EQUIPO</th>
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">MARCA</th>
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">MODELO</th>
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">SERIAL</th>
                                <th scope="col" class = " border border-dark text-center " style="width: 15rem;">CONSECUTIVO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class ="border border-dark text-center"> </td>
                                <td class ="border border-dark text-center"><?php  echo $dato["tipo"];?></td>
                                <td class ="border border-dark text-center"><?php  echo $dato["marca"];?></td>
                                <td class ="border border-dark text-center"><?php  echo $dato["MODELO"];?></td>
                                <td class ="border border-dark text-center"><?php  echo $dato["serial_imei"];?></td>
                                <td class ="border border-dark text-center"><?php  echo $dato["consecutivo"];?></td>
                            </tr>
                        </tbody>                
                    </table>
                </div>
                <!-- Informacion FIN-->
                <br>
            <div class="container   ">
                <!-- CUERPO INICIO -->
                <div class = "container border border-dark"> <b>HARDWARE Y SOFTWARE </b></div>
                <div class="container card mb-3 border border-dark" style="max-width: 100%">
                    <!-- IMG -->
                    <div class="row g-0">
                        <div class="col-md-4" >
                            <br>
                            <div class ="container text-center fw-bold">FOTO</div>
                            <img src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2018/08/fondos-pantalla-full-hd-animales_4.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <!-- INFO INCIO -->
                    <div class="card-body">
                                <!-- HARDWARE INICIO-->
                                <table class="container border border border-dark">
                                    <thead>
                                        <!-- <tr>
                                            <th colspan="4" class="border border-dark text-center" style="background-color:#BDBDBD;">HARDWARE</th>
                                        </tr> -->
                                        <tr class = "border border-dark" style="background-color:#BDBDBD;">
                                            <th scope="col" class = "border border-dark text-center ">HARDWARE</th>
                                            <th scope="col" class = "border border-dark text-center ">DETALLES</th>
                                            <th scope="col" class = "border border-dark text-center ">HARDWARE</th>
                                            <th scope="col" class = "border border-dark text-center ">DETALLES</th>
                                            </div>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <tr>
                                            <td class = "container border" style="width: 6rem;" ><b>Tamaño Pantalla<b></td>
                                            <td class = "container border text-center" style="width: 10rem;" ><?php  echo $dato["pantalla_pulgadas"];?></td>
                                            <td class = "border" style="width: 6rem;" ><b>Procesador<b></td>
                                            <td class = "border  text-center" style="width: 10rem;" ><?php  echo $dato["procesador"];?></td>
                                        </tr>
                                        <tr>
                                            <td class = " border contenido" style="width: 7rem;"><b>Marca Monitor<b></td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["marca_monitor"];?></td>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Teclado<b></td>
                                            <td class = "border text-center" style="width: 7rem;"><?php  echo $dato["teclado"];?></td>
                                        </tr>
                                        <tr>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Serial Monitor<b></td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["serial_monitor"];?></td>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Mouse<b></td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["mouse"];?></td>
                                        </tr>
                                        <tr>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Disco Duro<b></td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["disco_gb"];?></td>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Cargador<b></td>
                                            <td class = "border text-center" style="width: 7rem;" >PENDIENTE</td>
                                        </tr>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Memoria Ram<b></td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["memoria"];?></td>
                                            <td class = "border contenido" style="width: 7rem;" ><b>Otros<b> </td>
                                            <td class = "border text-center" style="width: 7rem;" ><?php  echo $dato["otro"];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- SOFTWARE INICIO-->
                                <table class="container border border border-dark ">
                                        <thead >
                                            <!-- <tr>
                                                <th colspan="4" class="border border-dark text-center" style="background-color:#BDBDBD ;">SOFTWARE</th>
                                            </tr> -->
                                            <tr class = "border" style="background-color:#BDBDBD;">
                                                <th scope="col" class = "border border-dark text-center" style="width: 6rem;">SOFTWARE</th>
                                                <th scope="col" class = "border border-dark text-center" style="width: 10rem;">DETALLES</th>
                                                <th scope="col" class = "border border-dark text-center" style="width: 6rem;">SOFTWARE</th>
                                                <th scope="col" class = "border border-dark text-center" style="width: 10rem;">DETALLES</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border border-dark">
                                            <tr>
                                                <td class = "border" style="width: 7rem;"><b>S. Operativo<b></td>
                                                <td class = "border text-center " style="width: 9rem;"><?php  echo $dato["sistema_operativo"];?></td>
                                                <td class = "border" style="width: 7rem;"><b>ERP<b></td>
                                                <td class = "border text-center"  style="width: 9rem;"><?php  echo $dato["erp"];?></td>
                                            </tr>
                                            <tr >
                                                <td class = "border" style="width: 7rem;"><b>Office<b></td>
                                                <td class = "border text-center" style="width: 9rem;"><?php  echo $dato["office"];?></td>
                                                <td class = "border" style="width: 7rem;"><b>Antivirus   <b></td>
                                                <td class = "border text-center" style="width: 9rem;"><?php  echo $dato["antivirus"];?></td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                            <!-- SOFTWARE FIN-->
                            <!-- HARDWARE FIN-->
                    </div>
                    <!-- INFO FIN -->
                    
                </div>
                <!-- CUERPO FIN -->
                </BR>
            </div>
            <!-- SEGURIDAD INICIO -->
                <div >
                    <table class = " container border border-dark">
                        <tr>
                            <td colspan="4" style="background-color:#BDBDBD;"><B>SEGURIDAD<B></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class ="border border-dark" style="width: 60rem"></td>
                            <td class="border border-dark" style="width: 10rem"><b>PRIVILEGIOS:<b></td>
                            <td class="border border-dark" style="width: 30rem"></td>
                            <td class="border border-dark" style="width: 30rem"></td>
                        </tr>
                    </table>
                </div>
            <!-- SEGURIDAD INICIO -->
            <br>
            <!-- ASIGNACIONES INICIO -->
                <div >
                    <table class = "container border border-dark" >
                        <tr>
                            <td colspan="5" style="background-color:#BDBDBD;">
                                <B>ASIGNACIONES<B>
                            </td>    
                            <td style="background-color:#BDBDBD";>
                                  <!-- Button trigger modal -->
                                  <button type= "button" class="btn btn-secondary btn-xs " data-bs-toggle="modal" data-bs-target="#asignacion" style="position: relative; left: 100px" >
                                    <i class="bi bi-person-plus-fill" ></i>
                                </button>
                                <?php
                                  include 'modal.php';  
                                ?>
                            </td>
                        </tr>
                        <tr class="" style="background-color:#E0E0E0;">
                            <th class="border border-dark text-center" style="width: 5rem">#</tH>
                            <th class="border border-dark text-center" style="width: 15rem"> FECHA RECIBE</th>
                            <th class="border border-dark text-center" style="width: 40rem"> NOMBRES Y APELLIDOS</th> 
                            <th class="border border-dark text-center" style="width: 15rem"> NO. DOCUMENTO</th> 
                            <th class="border border-dark text-center" style="width: 40rem"> AREA Y CARGO</th>
                            <th class="border border-dark text-center" style="width: 15rem"> FECHA ENTREGA</th> 
                        </tr>
                        <tr>
                            <td class="border border-dark text-center">1</td>
                            <td class="border border-dark text-center"> 25-02-2022 </td>
                            <td class="border border-dark text-center"> ASD ASD </td>
                            <td class="border border-dark text-center"> ASD ASD </td>
                            <td class="border border-dark text-center"> ASD ASD </td>
                            <td class="border border-dark text-center"> ASD ASD </td>
                        </tr>
                    </table>
                </div>
            <!-- ASIGNACIONES INICIO -->
            <br>
            <!-- MANTENIMIENTOS INICIO -->
               <div >
                    <table class = "container border border-dark" >
                        <tr>
                            <td class = "    " colspan="4" style="background-color:#BDBDBD;">
                                <B>MANTENIMIENTOS PREVENTIVOS Y/O CORRECTIVOS (TEI-PG-001, TEI-FT-007, TEI-FT-008)<B> 
                                <button type="button" class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#mantenimeinto" style="position: relative; left:33%">
                                     <i class="bi bi-tools"></i>
                                </button>                            
                            </td>
           
                        </tr>
                        <tr class="" style="background-color:#E0E0E0;">
                            <th class="border border-dark text-center" style="width: 5rem">#</tH>
                            <th class="border border-dark text-center" style="width: 15rem"> FECHA</th>
                            <th class="border border-dark text-center" style="width: 30rem"> NOMBRE QUIEN EJECUTA</th> 
                            <th class="border border-dark text-center" style="width: 60rem">OBSERVACIONES</th> 
                        </tr>
                        <tr>
                            <td class="border border-dark text-center">1</td>
                            <td class="border border-dark text-center"> 25-02-2022 </td>
                            <td class="border border-dark text-center"> BRYAN YESID HERREÑO VASQUEZ </td>
                            <td class="border border-dark text-center"> La canción es una composición lírica popular de origen provenzal. Es un poema admir
                                            ativo que expresa una emoción y que tiene por lo general tema amoroso. Llegó a España en el Renacimiento a través de la literatura italiana. </td>
                        </tr>
                    </table>
                </div>
            <!-- MANTENIMIENTOS INICIO -->
            <br>
</div>
       
</body>
    <!--  -->
</html>