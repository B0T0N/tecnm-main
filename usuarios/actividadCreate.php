<?php

include ('../app/config/config.php');

$sql = ("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
$query = $bdd->prepare( $sql );
$query->execute();
$resultado = $query->fetch(PDO::FETCH_OBJ);

$idCiclo = $resultado === false ? 1 : $resultado->id;

$lunes=(isset($_POST['lunes']))?$_POST['lunes']:"";
$martes=(isset($_POST['martes']))?$_POST['martes']:"";
$miercoles=(isset($_POST['miercoles']))?$_POST['miercoles']:"";
$jueves=(isset($_POST['jueves']))?$_POST['jueves']:"";
$viernes=(isset($_POST['viernes']))?$_POST['viernes']:"";

if (isset($_POST['nombreActividad']) && isset($_POST['horaActividad']) && isset($_POST['horaHacer']) && isset($_POST['encargadoActividad']) && isset($_POST['lugarActividad']) && isset($_POST['idCampo'])){
	
	$nombres=strtoupper($_POST['nombreActividad']);
    $ap_paterno=$_POST['horaActividad'];
    $numero_control=$_POST['horaHacer'];
    $carrera=$_POST['encargadoActividad'];
    $estado=strtoupper($_POST['lugarActividad']);
    $semestre=$_POST['idCampo'];

	$dias = $lunes.' '.$martes.' '.$miercoles.' '.$jueves.' '.$viernes;

	$prioridad = 1;
	$habilitar = 1;

	$sql = "INSERT INTO extraescolar(nombreActividad, horaActividad, diaActividad, horaHacer, encargadoActividad, lugarActividad, prioridad, habilitar, idCategoria, idCiclo) values ('$nombres','$ap_paterno', '$dias', '$numero_control', '$carrera', '$estado','$prioridad','$habilitar', '$semestre','$idCiclo')";
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}

header('Location: actividadesCampo.php?id='.$semestre);
?>