<?php






include('../app/config/config.php');

$nombres = strtoupper($_POST['nombres']);
$ap_paterno = strtoupper($_POST['ap_paterno']);
$ap_materno = strtoupper($_POST['ap_materno']);
$sexo = strtoupper($_POST['sexo']);
$numero_control = strtoupper($_POST['numero_control']);
$carrera = strtoupper($_POST['carrera']);
$correo = strtoupper($_POST['correo']);
$estado_civil = strtoupper($_POST['estado_civil']);
$telefono = strtoupper($_POST['telefono']);
$ciudad = strtoupper($_POST['ciudad']);
$colonia = strtoupper($_POST['colonia']);
$calle = strtoupper($_POST['calle']);
$codigo_postal = strtoupper($_POST['codigo_postal']);
$curp = strtoupper($_POST['curp']);
$fecha_nacimiento = strtoupper($_POST['fecha_nacimiento']);
//$nivel_escolar = $_POST['nivel_escolar'];
//$reticula = $_POST['reticula'];
//$entidad = $_POST['entidad'];
$contraseña = $_POST['contraseña'];
$contraseñaConfirm = $_POST['contraseñaConfirm'];
$user_creacion = "ESCAMILLA";

if ($contraseña == $contraseñaConfirm) {

  //encriptar contraseña
  $contraseña = password_hash($contraseña, PASSWORD_DEFAULT, ['cost' => 10]);

  date_default_timezone_set("America/Monterrey");

  $fechaHora = date('Y-m-d h:i:s');
  $estado = '1';

  $nombre_de_foto_perfil = "SisTECNM-" . date('Y-m-d-h-i-s');
  $filename = $nombre_de_foto_perfil . "_" . $_FILES['file']['name'];

  $location = "update_usuarios/" . $filename;

  move_uploaded_file($_FILES['file']['tmp_name'], $location);
  //echo $nombres ." - ".$ap_paterno." - ".$ap_materno." - ".$sexo." - ".$numero_control." - ".$carrera." - ".$correo." - ".$estado_civil." - ".$telefono." - ".$ciudad." - ".$colonia." - ".$calle." - ".$codigo_postal." - ".$curp." - ".$fecha_nacimiento." - ".$nivel_escolar." - ".$reticula." - ".$entidad." - ".$contraseña." - ".$user_creacion. " - ".$fechaHora." - ".$estado;

  $inserta = "INSERT INTO tb_usuarios (nombres, ap_paterno, ap_materno, sexo, numero_control, carrera, correo, estado_civil, telefono, ciudad, colonia, calle, codigo_postal, curp, fecha_nacimiento, foto_perfil, contrasenia, cargo, user_creacion, fyh_creacion, estado) VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$sexo', '$numero_control', '$carrera', '$correo', '$estado_civil', '$telefono', '$ciudad', '$colonia', '$calle', '$codigo_postal', '$curp', '$fecha_nacimiento', '$filename', '$contraseña', 2, '$user_creacion', '$fechaHora', '$estado')";

  $resultado = mysqli_query($conexion, $inserta);
  if (!$resultado) {
    if (mysqli_error($conexion) == "Duplicate entry '$correo' for key 'tb_usuarios.PRIMARY'") {
      echo '<script language="javascript">alert("El usuario ya existe");window.location.href="create.php"</script>';
    } else {
      echo '<script language="javascript">alert("No se pudo guardar. Inténtalo de nuevo.");window.location.href="create.php"</script>';
    }
  } else {
    echo '<script language="javascript">alert("Usuario guardado");window.location.href="create.php"</script>';
  }
}





mysqli_close($conexion);
