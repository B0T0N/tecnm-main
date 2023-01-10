<?php

include('../app/config/config.php');

$encabezado = $_POST['encabezado'];
$pie = $_POST['pie'];




//sentencia sql
$sql = "INSERT INTO formato_constancia (encabezado,
                                pie_pagina) 
                                VALUES 
                                ('$encabezado',
                                       '$pie')";


//ejecutamos sql

$ejecutar = mysqli_query($conexion, $sql);
//verificamos la ejecucion
if (!$ejecutar) {
  echo 'Error al registrarse';
} else {
  header('Location: formato_constancia.php');
}
mysqli_close($conexion);
