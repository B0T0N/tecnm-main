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
          <h1>FORMATO DE LAS CONSTANCIAS</h1>
          <br> <br>

          <div class="container" style="padding: 60px 90px 60px 40px; background: white;">
            <form action="formato_constancia_ctrl.php" method="POST">
              <label for="encabezado">Ingresa el encabezado de la constancia</label>
              <input type="text" name="encabezado" id="encabezado">
              <br><br> <br>

              <b>C.Jefe del departamento</b>
              <p style="line-height: 22px;">
                Jefe(a) del Departamento de Servicios Escolares o su equivalente en los Institutos Tecnológicos Descentralizados

                <br>
                PRESENTE.
              </p>
              <p style="text-align: justify; line-height: 22px;">
                El que se suscribe <b>Persona que suscribe</b>, por
                este medio se permite hacer de su conocimiento que el estudiante <b>Nombre del alumno</b>
                con numero de control <b>Matricula del alumno</b>
                de la carrera de <b>Carrera del alumno</b>
                ha cumplido su actividad complementaria con el nivel de desempeño <b>Desempeño del alumno</b>
                y un valor numérico de <b>Valor numerico del desempeño</b>
                durante el periodo escolar <b>Ciclo escolar</b>
                con un valor curricular de <b>Valor curricular</b>
                créditos.
              </p>
              <p style="text-align: right;">
                Se extiende la presente en la
                fecha <b>Fecha</b>
              </p>
              <p>
                <b>ATENTAMENTE</b>
              </p>
              <br>
              <br>
              <br>
              <br>
              <div>
                <div style="margin:0 auto 0;">
                  <b>_____________________________________ <span style="color: white;">-------------</span> _____________________________________</b>
                  <p><b>NOMBRE Y FIRMA DEL DOCENTE <br> RESPONSABLE </b> <span style="color: white;">------------------------------------------------</span> Jefa de Departamento de Area Académica
                  </p>
                </div>
                <br>

                <p style="font-size: 14px;">c.c.p. Mirsha Gabriela Magaña Cruz, Jefe de Departamento de Ciencias Básicas</p>
                <br>
                <br>
                <br>

              </div>
              <label for="pie">Ingresa el pie de pagina de la constancia</label>
              <input type="text" name="pie" id="pie">
              <br><br>
              <input type="submit" class="btn btn-success" value="Aceptar">
            </form>
          </div>
          <br>
          <br>


  </body>

  </html>

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
