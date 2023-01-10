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

$sqlCliente   = ("SELECT tb_usuarios.id, tb_usuarios.nombres,tb_usuarios.ap_paterno,tb_usuarios.ap_materno,tb_usuarios.carrera,tb_usuarios.numero_control,tb_usuarios.telefono,grupo.habilidad,grupo.desempeyo,grupo.calificacion,grupo.idActividad FROM grupo INNER JOIN tb_usuarios ON grupo.matricula = tb_usuarios.numero_control WHERE grupo.idActividad = $id");
$queryCliente = mysqli_query($conexion, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);

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
    <title></title>
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
                        Gestión de alumnado
                        <small>Guia de Actividades Complementarias</small>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Actividad Extraescolar <?php echo $nombre_actividad ?> </div>
                            <div class="panel-body">
                                
                            <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">carrera</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Observacion</th>
                            <th scope="col">Desempeño</th>
                            <th scope="col">Acreditacion</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['nombres']." ".$dataCliente['ap_paterno']; ?></td>
                            <td><?php echo $dataCliente['carrera']; ?></td>
                            <td><?php echo $dataCliente['numero_control']; ?></td>
                            <td><?php echo $dataCliente['telefono']; ?></td>
                            <td><?php echo $dataCliente['habilidad']; ?></td>
                            <td><?php echo $dataCliente['desempeyo']; ?></td>
                            <td><?php if ($dataCliente['calificacion'] == 1) {
                                echo "Acreditado";
                            } else if ($dataCliente['calificacion'] == 2){
                                echo "No Acreditado";
                            } ?></td>
                            
                          <td> 
                            
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['id']; ?>">
                                  Acreditacion
                              </button>
                          </td>
                          </tr>
                     

                            <!--Ventana Modal para Actualizar--->
                            <?php  include('ModalEditar.php'); ?>

                        <?php } ?>
                
                    </table>
                                
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
