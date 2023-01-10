<?php






include('../app/config/config.php');

$nombres = strtoupper($_POST['nombre']);
$ap_paterno = strtoupper($_POST['paterno']);
$ap_materno = strtoupper($_POST['materno']);
$sexo = strtoupper($_POST['sexo']);
$correo = strtoupper($_POST['correo']);
$telefono = strtoupper($_POST['telefono']);
$cargo = $_POST['cargo'];
$profesion = strtoupper($_POST['profesion']);
//$cubiculo = $_POST['cubiculo'];
$area = strtoupper($_POST['area']);
$contraseña = $_POST['contraseña'];
$contraseñaConfirm = $_POST['contraseñaConfirm'];

$user_creacion = "Administrador";
$cargo2 = 0;

//cambiar cargo, de letras a numeros
if ($cargo == "Administrador") {
  $cargo2 = '0';
} else if ($cargo == "Maestro") {
  $cargo2 = '1';
}

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

  $inserta = "INSERT INTO tb_usuarios (nombres, ap_paterno, ap_materno, sexo, correo, telefono, cargo, profesion, area, foto_perfil, contrasenia, user_creacion, fyh_creacion, estado) VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$sexo', '$correo', '$telefono', '$cargo2', '$profesion', '$area', '$filename', '$contraseña', '$user_creacion', '$fechaHora', '$estado')";

  $resultado = mysqli_query($conexion, $inserta);
  if (!$resultado) {
    if (mysqli_error($conexion) == "Duplicate entry '$correo' for key 'tb_usuarios.PRIMARY'") {
      echo '<script language="javascript">alert("El usuario ya existe");window.location.href="create_usuario.php"</script>';
    } else {
      echo '<script language="javascript">alert("No se pudo guardar. Inténtalo de nuevo.");window.location.href="create_usuario.php"</script>';
    }
  } else {
    echo '<script language="javascript">alert("Usuario registrado");window.location.href="create_usuario.php"</script>';
  }
}


mysqli_close($conexion);
