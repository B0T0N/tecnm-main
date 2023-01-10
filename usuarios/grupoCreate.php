<?php

include ('../app/config/config.php');

if (isset($_POST['periodo']) && isset($_POST['carrera'])&& isset($_POST['semestre'])){
	
	
	
	$carrera=$_POST['carrera'];
    $periodo=$_POST['periodo'];
    $semestre=$_POST['semestre'];
    
	$sql = "INSERT INTO grupos(carrera,periodo,semestre) VALUES ('$carrera','$periodo','$semestre')";
	
	
	echo $sql;
	
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
header('Location: añadirGrupo.php');
