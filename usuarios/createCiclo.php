<?php

include('../app/config/config.php');

/*********************************************************************************************************/

	/* LLAMAMOS AL ULTIMO ID DE LA TABLA CICLO */

	$sentencia = $con->prepare("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	$idCicloA = $resultado->id;


/*********************************************************************************************************/
	
	/* NUEVA FILA DE TABLA CICLO */

	if (isset($_POST['inicio']) && isset($_POST['fin']) && isset($_POST['descripcion'])){

		$inicio=$_POST['inicio'];
		$fin=$_POST['fin'];
		$descripcion=strtoupper($_POST['descripcion']);

		$sentencia = $con->prepare("INSERT INTO ciclo( cicloInicio, cicloFin, descripcion) VALUES (?, ?, ?);");

		$ciclo = $sentencia->execute([$inicio, $fin, $descripcion]);
	}

/*********************************************************************************************************/

$sentencia = $con->prepare("SELECT nombreCategoria, prioridad, habilitar, idImagen FROM categorias WHERE idCiclo = $idCicloA AND prioridad = 1");
$sentencia->execute();
$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);

$sentencia = $con->prepare("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idCiclo = $resultado->id;

$con->beginTransaction();
    
    $porro = $con->prepare("INSERT INTO categorias (nombreCategoria, prioridad, habilitar, idImagen, idCiclo) VALUES (?,?,?,?,?);");

    foreach ($categorias as $categoria) {

        $porro->execute([$categoria->nombreCategoria, $categoria->prioridad, $categoria->habilitar, $categoria->idImagen, $idCiclo]);

        $sentencia = $con->prepare("SELECT id FROM categorias ORDER BY id DESC LIMIT 1");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $idCategoria = $resultado->id;

        $sentencia = $con->prepare("SELECT nombreCategoria FROM categorias ORDER BY id DESC LIMIT 1");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $nombreCategoria = $resultado->nombreCategoria;

        $sentencia = $con->prepare("SELECT id FROM categorias WHERE idCiclo = $idCicloA AND nombreCategoria = '$nombreCategoria';");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $idCategoriaViejo = $resultado->id;

        $sentencia = $con->prepare("SELECT nombreActividad, horaActividad, diaActividad, horaHacer, encargadoActividad, lugarActividad, prioridad, habilitar FROM extraescolar WHERE idCiclo = $idCicloA AND idCategoria = $idCategoriaViejo AND prioridad = 1");
        $sentencia->execute();
        $actividades = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $sentencia = $con->prepare("INSERT INTO extraescolar (nombreActividad, horaActividad, diaActividad, horaHacer, encargadoActividad, lugarActividad, prioridad, habilitar, idCategoria, idCiclo) VALUES (?,?,?,?,?,?,?,?,?,?)");

        foreach ($actividades as $actividad) {
            $sentencia->execute([$actividad->nombreActividad, $actividad->horaActividad,$actividad->diaActividad, $actividad->horaHacer, $actividad->encargadoActividad , $actividad->lugarActividad,$actividad->prioridad, $actividad->habilitar, $idCategoria, $idCiclo]);
        }

    }

$con->commit(); 

header('Location: extraexcolar.php');
	
?>
