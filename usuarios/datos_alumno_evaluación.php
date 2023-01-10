<?php

//use Sabberworm\CSS\Value\Value;

include('../app/config/config.php');

if (isset($_POST['buscar'])) {
  $matricula_buscar = $_POST['matricula_buscar'];
  $valores = array();
  $valores['existe'] = "0";
  $actividad_array = array();
  $ruta_act = array();
  $evento_id = array();
  $maestro = $_POST['maestro'];


  //consultar a la BD las actividades
  //$resultados = mysqli_query($conexion, "SELECT nombres, ap_paterno, ap_materno, id_evento FROM tb_usuarios INNER JOIN evidencia ON tb_usuarios.numero_control = evidencia.numero_control WHERE evidencia.numero_control = '$matricula_buscar';");
  //while ($consulta = mysqli_fetch_array($resultados)) {
  //$valores['existe'] = '1';
  //$valores['nombre'] = $consulta['nombres'];
  //$valores['id_evento'] = $consulta['id_evento'];
  //$valores = json_encode($valores);
  // echo $valores;
  //}

  //-----------------traer las actividades del alumno
  $actividades = mysqli_query($conexion, "SELECT title, ruta_doc, id_evento FROM events INNER JOIN evidencia ON events.id = evidencia.id_evento WHERE evidencia.numero_control = '$matricula_buscar' and events.respons = '$maestro'");
  //$consulta2 = mysqli_fetch_array($actividades);

  while ($consulta2 = mysqli_fetch_array($actividades)) {
    $actividad_array[] = $consulta2['title'];
    $ruta_act[] = $consulta2['ruta_doc'];
    $evento_id[] = $consulta2['id_evento'];
  }

  //----------------------traer el nombre del alumno
  $resultados = mysqli_query($conexion, "SELECT nombres, ap_paterno, ap_materno FROM tb_usuarios WHERE numero_control = '$matricula_buscar'");
  while ($consulta = mysqli_fetch_array($resultados)) {
    $valores['existe'] = "1";
    $valores['nombre'] = $consulta['nombres'];
    $valores['ap_paterno'] = $consulta['ap_paterno'];
    $valores['ap_materno'] = $consulta['ap_materno'];
    $valores['actividades'] = $actividad_array;
    $valores['ruta'] = $ruta_act;
    $valores['id_evento'] = $evento_id;
    $valores = json_encode($valores);
    echo $valores;
  }
}


mysqli_close($conexion);
