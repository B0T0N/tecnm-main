<?php
include('../app/config/config.php');
session_start();
if (isset($_SESSION['u_usuario'])) {
    //echo "existe sesión";
    //echo "bienvenido usuario";
    $correo_sesion = $_SESSION['u_usuario'];
    $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
    $query_sesion->execute();
    $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($sesion_usuarios as $sesion_usuario) {
        $id_sesion = $sesion_usuario['id'];
        $id_nombres = $sesion_usuario['nombres'];
        $id_ap_paterno = $sesion_usuario['ap_paterno'];
        $id_ap_materno = $sesion_usuario['ap_materno'];
        $id_sexo = $sesion_usuario['sexo'];
        $id_numero_control = $sesion_usuario['numero_control'];
        $id_carrera = $sesion_usuario['carrera'];
        $id_correo = $sesion_usuario['correo'];
        $id_estado_civil = $sesion_usuario['estado_civil'];
        $id_telefono = $sesion_usuario['telefono'];
        $id_ciudad = $sesion_usuario['ciudad'];
        $id_colonia = $sesion_usuario['colonia'];
        $id_calle = $sesion_usuario['calle'];
        $id_codigo_postal = $sesion_usuario['codigo_postal'];
        $id_curp = $sesion_usuario['curp'];
        $id_fecha_nacimiento = $sesion_usuario['fecha_nacimiento'];
        $id_nivel_escolar = $sesion_usuario['nivel_escolar'];
        $id_reticula = $sesion_usuario['reticula'];
        $id_entidad = $sesion_usuario['entidad'];
        $id_foto_perfil = $sesion_usuario['foto_perfil'];
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <?php include('../layout/head.php'); ?>
        <title>Asigancion de tutores</title>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        
        <?php
        
            $sql = "SELECT * FROM `tutores` LEFT JOIN grupos ON grupos.id=tutores.grupo;";
            $resultado = mysqli_query($conexion, $sql);
            ?>


            
            <?php include('../layout/menu.php'); ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Asignacion de tutores
                </section>

                <div class="container">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Nuevo Tutor
                    </button>

                </div>

                <!-- Main content -->
                <section class="content">


                    <form action="tutorcreate.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Agregar tutor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row">

                                            <div class="col">
                                                <div class="form-group" class="col-sm2 control-label">
                                                    <label for="categoria">Nombres</label>
                                                    <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre tutor" required>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group" class="col-sm2 control-label">
                                                    <label for="apellido_paterno">Apellido paterno</label>
                                                    <input type="text" name="apellido_paterno" id="" class="form-control" placeholder="Apellido paterno" required>
                                                </div>

                                            </div>





                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="id_alumno" class="col-sm2 control-label">Apellido materno</label>
                                                    <div class="">
                                                        <input type="text" name="apellido_materno" id="" class="form-control" placeholder="apellido materno" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" value="Registrar">Guardar</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>


                    <br>
                    <!-- Listado de incidencias -->

                    <div class="panel panel-primary">


                        <div class="panel-heading">Listado de tutores asignados</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-condensed">

                                <th>Nombre</th>
                                <th>Apellido materno</th>
                                <th>Apellido paterno</th>
                               <th>Grupo asignado</th>
                                



                                <?php
                                while ($filas = mysqli_fetch_assoc($resultado)) {
                                ?>
                             
                                    <tr>

                                        <td><?php echo $filas['nombre'] ?></td>
                                        <td><?php echo $filas['apellido_paterno'] ?></td>
                                        <td><?php echo $filas['apellido_materno'] ?></td>
                                      
                                 
                                        
<td>

<?php 
                                        if($filas['carrera'] === null ){
                                            echo 'Aun no existe grupo asignado';
                                        }else{
                                            echo $filas['carrera'] ;
                                        }
                                        ?>
                                    


</td>


                                        <td>





                                                </div>




                                            </div>
                                        </div>
                        </div>
                    </div>

                    <div>



                        </tr>
                    <?php

                                }


                    ?>


                    </table>
                    </div>
            </div>
            </section>

        </div>








        <!-- /.content-wrapper -->
        <?php include('../layout/footer.php'); ?>
        <?php include('../layout/footer_links.php'); ?>


    </body>

    </html>

<?php
} else {
    echo "no existe sesión";
    header('Location:' . $URL . '/login');
}

