<?php
include('../app/config/config.php');
session_start();
if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0) {
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
      <?php include('../layout/menu.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- cierre sesion por inactividad -->
        <?php if ($_SESSION["ultimoAcceso"] >= 600) {
          echo ("<meta http-equiv='refresh' content='600'>");
        } ?>
        <section class="content-header">
          <h1>
            SISTEMA DE CRÉDITOS COMPLEMENTARIOS
            <small>Guia de Actividades Complementarias</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Guia de Actividades Complementarias</div>
            <div class="panel-body">
              <table class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>Actividad</th>
                    <th>Descripción</th>
                    <th>Créditos por actividad</th>
                    <th>Máximo Acumular</th>
                  </tr>
                </thead>

                <tr>
                  <td>Movilidad Academica</td>
                  <td>Estancias en instituciones educativas de nivel superior,
                    centros de investigacion, y empresas (al menos durante 4 Semanas Nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                </tr>
                <tr>
                  <td>Movilidad Academica</td>
                  <td>Estancias en instituciones educativas de
                    nivel superior, centros de investigacion,
                    y empresas (al menos durante 4 Semanas
                    Internacional</td>
                  <td>2.0</td>
                  <td>2.0</td>
                </tr>
                <tr>
                  <td>Conferencia y/o Platica</td>
                  <td>Asistencia o participación dentro o
                    fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional)
                    relacionada con el profesional</td>
                  <td>0.2</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Congreso, Seminario, Simponsio y/o Coloquio</td>
                  <td>Asistencia o participacion dentro o fuera del instituto
                    en cualquier nivel que se trate, (local, regional, Nacional)
                    relacionada con el profesional</td>
                  <td>0.4</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Curso y/o curso taller</td>
                  <td>Participación o imparticion dentro o fuera de la institucion en cualquier nivel que se trate, (local, regional, Nacional)
                    relacionado con el perfil profesional, con una duracion minima de 20 horas (presencial o a distancia)</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Diplomado</td>
                  <td>Participación o imparticion dentro o fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional)
                    relacionado con el perfil profesional, con una duracion minima de 90 horas (presencial o a distancia)</td>
                  <td>2.0</td>
                  <td>2.0</td>
                </tr>

                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                </tr>
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                </tr>
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                </tr>
                <tr>
                  <td>Diseño de Prototipos</td>
                  <td>Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional</td>
                  <td>0.75</td>
                  <td>1.5</td>
                </tr>
                <tr>
                  <td>Diseño de Software</td>
                  <td>Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional</td>
                  <td>0.75</td>
                  <td>1.5</td>
                </tr>
                <tr>
                  <td>Diseño en proyecto</td>
                  <td>Participar en un proyecto de producción, vinculación e investigación previamente autorizado de acuerdo a su perfil profesional realizando las actividades programadas, al menos durante 40 horas</td>
                  <td>0.5</td>
                  <td>1.0</td>
                </tr>
              </table>
            </div>
            <!-- /.content -->
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
