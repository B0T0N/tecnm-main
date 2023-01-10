<?php
$id=$_GET['id_incidencia'];
include ('../app/config/config.php');


//consulta a la tabla eliminar

$sql = "DELETE FROM tb_incidencia WHERE id_incidencia='".$id."'";

$resultado = mysqli_query($conexion,$sql);

if($resultado){

    echo "<script languaje='JavaScript'>
    alert('Los datos se eliminaron correctamente');
    location.assign('incidencias.php')
    </script>";

}else{
    echo "<script languaje='JavaScript'>
    alert('Los datos no se eliminaron correctamente');
    location.assign('incidencias.php')
    </script>";

}

?>