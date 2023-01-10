<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 2 ) {
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
    $privilegio = $sesion_usuario['cargo'];
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
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/styleindex.css">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menuuser.php'); ?>

      <!-- cierre sesion por inactividad -->
      <?php if ($_SESSION["ultimoAcceso"] >= 600) {
        echo ("<meta http-equiv='refresh' content='600'>");
      } ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper containerTitulo">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="titulo">
            SISTEMA DE CREDITOS COMPLEMENTARIOS
          </h1>

        </section>
        <img src="../images/itchina-1.jpg" alt="" class="itchina">
      </div>
      <?php include('../layout/footer.php'); ?>
    </div>
    <?php include('../layout/footer_links.php'); ?>
  </body>

  </html>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
