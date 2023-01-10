<?php

include ('../app/config/config.php');

if (isset($_POST['cbx_actividad']) && isset($_POST['id_usuario'])){
	
	$usuario=$_POST['id_usuario'];
	$actividad =$_POST['cbx_actividad'];

	$sql = "INSERT INTO encargado(idUsuario, idActividad) VALUES ($usuario, $actividad)";

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

    header('Location: extraexcolar.php');
}

?>