<?php

include('../app/config/config.php');
// obtenemos el valor y el resultado
$resultado = 0;
$valor = null;
$tiempo = $_POST['tiempo'];
$equipo = $_POST['equipo'];
$liderazgo = $_POST['liderazgo'];
$organiza = $_POST['organiza'];
$realidad = $_POST['realidad'];
$sugerencias = $_POST['sugerencias'];
$iniciativa = $_POST['iniciativa'];

$resultado = ($tiempo + $equipo + $liderazgo + $organiza + $realidad + $sugerencias + $iniciativa) / 7;
if ($resultado <= 4) {
  $valor = 'Excelente';
}
if ($resultado <= 3) {
  $valor = 'Notable';
}
if ($resultado <= 2) {
  $valor = 'Bueno';
}
if ($resultado <= 1) {
  $valor = 'Suficiente';
}
if ($resultado <= 0) {
  $valor = 'Insuficiente';
};


//traemos las variables
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$actividad = $_POST['actividad'];
$obs = $_POST['obs'];
//$valor=$_POST['valor'];
//$nivel=$_POST['nivel'];


//sentencia sql
$sql = "INSERT INTO creditos (matricula,
                                nombre,
                                observacion,
                                valor,
                                desmp,
                                id_evento) 
                                VALUES 
                                ('$matricula',
                                       '$nombre',
                                       '$obs',
                                       '$resultado',
                                       '$valor',
                                       '$actividad')";


//ejecutamos sql

$ejecutar = mysqli_query($conexion, $sql);
//verificamos la ejecucion
if (!$ejecutar) {
  echo 'Error al registrarse';
} else {
  header('Location: evaluacionmaestro.php');
}
mysqli_close($conexion);
