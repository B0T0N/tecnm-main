<?php

include('../app/config/config.php');

if (isset($_POST['buscar'])) {
  $matricula_buscar = $_POST['buscar_matricula'];
  $datos = array();
  //$datos['existe'] = "0";
  /*$nombre = array();
  $obs = array();
  $desemp = array();
  $valor = array();
  $ruta = array();
  $credito = array();
  $title = array();
*/
  $alumno_input = array();

  $alumno = mysqli_query($conexion, "SELECT nombres, ap_paterno, ap_materno, numero_control, carrera FROM tb_usuarios where numero_control = '$matricula_buscar'");
  while ($alumnos_array = mysqli_fetch_array($alumno)) {
    $datos[] = $alumnos_array;
  }

  $resultados = mysqli_query($conexion, "SELECT nombre, observacion, desmp, valor, ruta_doc, credito, title FROM creditos INNER JOIN evidencia ON creditos.id_evento = evidencia.id_evento INNER JOIN events ON events.id = evidencia.id_evento WHERE evidencia.numero_control = '$matricula_buscar' AND creditos.matricula = '$matricula_buscar'");
  while ($consulta = mysqli_fetch_array($resultados)) {
    /*$nombre[] = $consulta['nombre'];
    $obs[] = $consulta['observacion'];
    $desemp[] = $consulta['desmp'];
    $valor[] = $consulta['valor'];
    $ruta[] = $consulta['ruta_doc'];
    $credito[] = $consulta['credito'];
    $title[] = $consulta['title'];*/
    $datos[] = $consulta;
  }

  $datos = json_encode($datos);
  echo $datos;
  /*$datos['existe'] = "1";
  $datos['nombre'] = $nombre;
  $datos['obs'] = $obs;
  $datos['desemp'] = $desemp;
  $datos['valor'] = $valor;
  $datos['ruta'] = $ruta;
  $datos['credito'] = $credito;
  $datos['title'] = $title;*/
}




mysqli_close($conexion);
