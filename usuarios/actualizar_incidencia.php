<?php

include ('../app/config/config.php');

if (isset($_POST['status']) ){
	
	$id = $_POST['id'];
	$incidencia = $_POST['status'];
	$actualiza = $_POST['motivoacc'];
	

 $sql= "UPDATE tb_incidencia SET Estado = '$incidencia', motivo_actualizacion = '$actualiza' WHERE id_incidencia = $id";


 

	
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
header('Location: incidencias.php');
 