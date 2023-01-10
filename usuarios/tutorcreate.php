<?php

include ('../app/config/config.php');

if (isset($_POST['nombre'])&& isset($_POST['apellido_paterno']) && isset($_POST['apellido_materno'])){
	
	
	$nombres=$_POST['nombre'];
	$ap_paterno=$_POST['apellido_paterno'];
    $ap_materno=$_POST['apellido_materno'];
  
    
	$sql = "INSERT INTO tutores(nombre,apellido_paterno,apellido_materno) VALUES ('$nombres','$ap_paterno','$ap_materno')";
	
	
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
header('Location: añadirTutor.php');
