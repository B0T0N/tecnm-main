
<?php
include('../app/config/config.php');
// obtenemos el valor y el resultado
$resultado = 0;
$valor = null;
$idRegistros = $_REQUEST['id'];
$control = $_REQUEST['control'];
$actividad = $_REQUEST['actividad'];
$habilidad = $_REQUEST['habilidad'];
$calificacion = $_REQUEST['calificacion'];
$tiempo = $_POST['tiempo'];
$equipo = $_POST['equipo'];
$liderazgo = $_POST['liderazgo'];
$organiza = $_POST['organiza'];
$interpreta = $_POST['interpreta'];
$realiza = $_POST['realiza'];
$iniciativa = $_POST['iniciativa'];

$resultado = ($tiempo + $equipo + $liderazgo + $organiza + $interpreta + $realiza + $iniciativa) / 7;
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

$update = ("UPDATE grupos 
	SET 
	habilidad  ='" .$habilidad. "',
	valor  ='" .$resultado. "',
	desempeyo  ='" .$valor. "',
	calificacion  ='" .$calificacion. "'

WHERE matricula='" .$control. "' AND idActividad='".$actividad."'
");
$result_update = mysqli_query($por, $update);

header('Location: alumnosListado.php?id='.$actividad);

?>
