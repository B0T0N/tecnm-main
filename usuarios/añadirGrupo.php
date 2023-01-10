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
    <?php
        $sql = "SELECT * FROM grupos";

            $resultado = mysqli_query($conexion, $sql);
        
            ?>

    <head>
        <?php include('../layout/head.php'); ?>
        
        <title>Añadir grupo</title>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        
            <?php include('../layout/menu.php'); ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Asignación de tutores al grupo
                </section>

            
<div class="container">
<?php include('../usuarios/modalprueba.php'); ?>
</div>
                <!-- Main content -->
                <section class="content">
                    <br>
                    <!-- Listado de incidencias -->

                    <div class="panel panel-primary">


                        <div class="panel-heading">Listado</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-condensed">

                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Ciclo escolar</th>
                                <th>Acciones</th>




                                <?php
                                while ($filas = mysqli_fetch_assoc($resultado)) {
                                ?>

                                    <tr>

                                        <td><?php echo $filas['carrera'] ?></td>
                                        <td><?php echo $filas['semestre'] ?></td>
                                        <td><?php echo $filas['periodo'] ?></td>
                                 <td>
                                 <?php include('../usuarios/modaltutor.php'); ?>
</td>

 <td><a href="informaciongrupo.php"><button type="submit" class="btn btn-success">Ver grupo</button></a></td>
         



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

