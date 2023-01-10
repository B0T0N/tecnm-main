<?php

include ('../app/config/config.php');

if (isset($_POST['id']) ){
	
	$id = $_POST['id'];
	$privilegio = $_POST['cargo'];
	$nombres = $_POST['nombres'];
	$ap_paterno = $_POST['ap_paterno'];
	$ap_materno = $_POST['ap_materno'];
	$correo = $_POST['correo'];
	

 $sql= "UPDATE tb_usuarios SET cargo = '$privilegio', nombres = '$nombres', ap_paterno = '$ap_paterno', ap_materno = '$ap_materno', correo = '$correo' WHERE id = $id";


 

	
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
header('Location: lista-usuarios.php');
 