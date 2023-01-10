<?php
include('../app/config/config.php');
session_start();

if(!isset($_GET["id"])) exit();//preguntando si el metodo get tiene un valor, si no tiene uno sale del porceso
$id = $_GET["id"];

$sql = ("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
$query = $bdd->prepare( $sql );
$query->execute();
$resultado = $query->fetch(PDO::FETCH_OBJ);

$idCiclo = $resultado === false ? 1 : $resultado->id;

$sql = ("SELECT nombreActividad FROM extraescolar WHERE idCiclo = $idCiclo AND id = $id");
$query = $bdd->prepare($sql);
$query->execute();
$extraescolar = $query->fetch(PDO::FETCH_LAZY);

$nombre_actividad = $extraescolar['nombreActividad'];

if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 1 ) {
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
  
  //control de inactividad
  $ahora = date("Y-n-j H:i:s");
  $fechaGuardada = $_SESSION["ultimoAcceso"];
  $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

  if ($tiempo_transcurrido >= 600) {
    //si pasaron 10 minutos o más
    session_destroy(); // destruyo la sesión
    header('location:../index.php'); //envío al usuario a la pag. de autenticación
    //sino, actualizo la fecha de la sesión
  } else {
    $_SESSION["ultimoAcceso"] = $ahora;
  }

?>

<!DOCTYPE html>

<html>

    <head>
    <?php include('../layout/head.php'); ?>
    <title>Guia de actividades Complementarias</title>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include('../layout/menumaestro.php'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- cierre sesion por inactividad -->
                <?php if ($_SESSION["ultimoAcceso"] >= 600) {
                echo ("<meta http-equiv='refresh' content='600'>");
                } ?>
                <section class="content-header">
                    <h1>
                        SISTEMA DE CREDITOS COMPLENTARIOS
                        <small>Guia de Actividades Complementarias</small>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">ENCARGO DE ACTIVIDAD <?php echo $nombre_actividad ?> </div>
                            <div class="panel-body">
                                <?php
                                $where="";
                                ?>

                                <form class="d-flex">
                                    <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
                                    placeholder="Buscar por matricula">
                                </form>
                                
                                <table class="table table-striped table-dark table_id ">
                                    <thead>    
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Sexo</th>
                                            <th>Matrícula</th>
                                            <th>Email</th>
                                            <th>telefono</th>
                                            <th>ciudad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php              
                                        $SQL="SELECT id, nombres, sexo, numero_control, correo, telefono, ciudad FROM tb_usuarios WHERE cargo = 2 $where";
                                        $dato = mysqli_query($conexion, $SQL);

                                        if($dato -> num_rows >0){
                                            while($fila=mysqli_fetch_array($dato)){
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['nombres']; ?></td>
                                            <td><?php echo $fila['sexo']; ?></td>
                                            <td><?php echo $fila['numero_control']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td><?php echo $fila['telefono']; ?></td>
                                            <td><?php echo $fila['ciudad']; ?></td>
                                            <td>
                                            <a class="btn btn-warning" href="<?php echo "agregandoAlumno.php?id=".$fila['id']."&"."extra=".$id?> ">
                                            Agregar Alumno</a>
                                            </td>
                                        </tr>


                                        <?php
                                            }
                                        }else{

                                            ?>
                                        <tr class="text-center">
                                            <td colspan="16">No existen registros</td>
                                        </tr>

                                        
                                        <?php          
                                        }
                                        ?>
                                
                            </div>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                    <?php include('../layout/footer_links.php'); ?>
                </section>
            </div>
        </div>
        <script src="js/acciones.js"></script>
        <script src="js/buscador.js"></script>
        
    </body>
    
</html>


<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
