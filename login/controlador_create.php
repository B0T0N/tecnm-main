<?php






include('../app/config/config.php');

$nombres = strtoupper($_POST['nombres']);
$ap_paterno = strtoupper($_POST['ap_paterno']);
$ap_materno = strtoupper($_POST['ap_materno']);
$numero_control = strtoupper($_POST['numero_control']);
$correo = $_POST['correo'];
$contrasenia = $_POST['contraseña'];
$user_creacion = "ESCAMILLA";

date_default_timezone_set("America/Monterrey");

$fechaHora = date('Y-m-d h:i:s');
$estado = 1;
$cargo = 2;

//


//encriptar contraseña
$contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT, ['cost' => 10]);


//echo $nombres ." - ".$ap_paterno." - ".$ap_materno." - ".$sexo." - ".$numero_control." - ".$carrera." - ".$correo." - ".$estado_civil." - ".$telefono." - ".$ciudad." - ".$colonia." - ".$calle." - ".$codigo_postal." - ".$curp." - ".$fecha_nacimiento." - ".$nivel_escolar." - ".$reticula." - ".$entidad." - ".$contraseña." - ".$user_creacion. " - ".$fechaHora." - ".$estado;

$inserta = "INSERT INTO tb_usuarios(nombres, ap_paterno, ap_materno, numero_control, correo, contrasenia, user_creacion, fyh_creacion, estado, cargo) VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$numero_control', '$correo', '$contrasenia', '$user_creacion', '$fechaHora', '$estado', '$cargo')";

$resultado = mysqli_query($conexion, $inserta);
if (!$resultado) {
  echo 'Error al registrarse';
} else {
  echo 'usuario registrado correctamente';
  header('Location: ../index.php');
}
mysqli_close($conexion);
