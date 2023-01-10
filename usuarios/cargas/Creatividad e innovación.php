<?php

include('../../app/config/config.php');

$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

$id_act = $_POST['evento'];

$num_control = $_POST['numero_control'];

$credito = $_POST['credit'];

//$responsable = $_POST['responsable'];

$apellido = $_POST['ap_paterno'];

if (!file_exists('Concurso de Creatividad e innovación')) {
  mkdir('Concurso de Creatividad e innovación', 0777, true);
  if (file_exists('Concurso de Creatividad e innovación')) {
    if (file_exists('Concurso de Creatividad e innovación/' . $num_control . '-' . $apellido . '-' . $id_act . '.pdf')) {
      echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
    } else {
      if (move_uploaded_file($guardado, 'Concurso de Creatividad e innovación/' . $num_control . '-' . $apellido . '-' . $id_act . '.pdf')) {

        $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc, credito) VALUES ('$num_control', '$id_act', 1, 'Concurso de Creatividad e innovación/$num_control-$apellido-$id_act.pdf', $credito)";
        $resultado = mysqli_query($conexion, $inserta);
        if (!$resultado) {
          echo 'Error al insertar archivo';
        } else {
          echo '<script language="javascript">alert("Archivo guardado");window.location.href="../agregar-credito-user.php"</script>';
        }
        mysqli_close($conexion);
      } else {
        echo '<script language="javascript">alert("Archivo no guardado");window.location.href="../agregar-credito-user.php"</script>';
      }
    }
  }
} else {

  if (file_exists('Concurso de Creatividad e innovación/' . $num_control . '-' . $apellido . '-' . $id_act . '.pdf')) {
    echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
  } else {
    if (move_uploaded_file($guardado, 'Concurso de Creatividad e innovación/' . $num_control . '-' . $apellido . '-' . $id_act . '.pdf')) {

      $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc, credito) VALUES ('$num_control', '$id_act', 1, 'Concurso de Creatividad e innovación/$num_control-$apellido-$id_act.pdf', $credito)";
      $resultado = mysqli_query($conexion, $inserta);
      if (!$resultado) {
        echo 'Error al insertar archivo';
      } else {
        echo '<script language="javascript">alert("Archivo guardado");window.location.href="../agregar-credito-user.php"</script>';
      }
      mysqli_close($conexion);
    } else {
      echo '<script language="javascript">alert("Archivo no guardado");window.location.href="../agregar-credito-user.php"</script>';
    }
  }
}
