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
    <?php
    $id = $sesion_usuario['id'];
    /*$nombres = strtoupper($_POST['nombres']);
    $ap_paterno = strtoupper($_POST['ap_paterno']);
    $ap_materno = strtoupper($_POST['ap_materno']);*/
    $sexo = strtoupper($_POST['sexo']);
    //$numero_control = strtoupper($_POST['numero_control']);
    $carrera = strtoupper($_POST['carrera']);
    //$correo = strtoupper($_POST['correo']);
    $estado_civil = strtoupper($_POST['estado_civil']);
    $telefono = strtoupper($_POST['telefono']);
    $ciudad = strtoupper($_POST['ciudad']);
    $colonia = strtoupper($_POST['colonia']);
    $calle = strtoupper($_POST['calle']);
    $codigo_postal = strtoupper($_POST['codigo_postal']);
    $curp = strtoupper($_POST['curp']);
    $fecha_nacimiento = strtoupper($_POST['fecha_nacimiento']);
    $nivel_escolar = strtoupper($_POST['nivel_escolar']);
    $reticula = strtoupper($_POST['reticula']);
    $entidad =  strtoupper($_POST['entidad']);
    date_default_timezone_set("America/Monterrey");

    $fechaHora = date('Y-m-d h:i:s');


    $nombre_de_foto_perfil = "SisTECNM-" . date('Y-m-d-h-i-s');
    $filename = $nombre_de_foto_perfil . "_" . $_FILES['file']['name'];

    $location = "update_usuarios/" . $filename;

    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    $edita = "UPDATE tb_usuarios SET sexo='$sexo', carrera='$carrera', estado_civil='$estado_civil', telefono='$telefono', ciudad='$ciudad', colonia='$colonia', calle='$calle', codigo_postal='$codigo_postal', curp='$curp', fecha_nacimiento='$fecha_nacimiento', nivel_escolar='$nivel_escolar', reticula='$reticula', entidad='$entidad', fyh_actualizacion='$fechaHora', foto_perfil='$filename' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $edita);
    if (!$resultado) {
      echo 'Error al actualizar';
    } else {
      header('Location: perfil.php');
    }
    mysqli_close($conexion);
  }
    ?>