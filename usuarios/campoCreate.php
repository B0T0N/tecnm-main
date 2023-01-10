<?php

include ('../app/config/config.php');

$sql = ("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
$query = $bdd->prepare( $sql );
$query->execute();
$resultado = $query->fetch(PDO::FETCH_OBJ);

$idCiclo = $resultado === false ? 1 : $resultado->id;

$prioridad = 1;
$habilitar = 1;

if (isset($_POST['nombreCampo']) && isset($_FILES['imagenCampo'])){
	
	$nombres=strtoupper($_POST['nombreCampo']);
	$imagen = addslashes(file_get_contents($_FILES['imagenCampo']['tmp_name']));

	$sql = "INSERT INTO imagen(imagen) VALUES ('$imagen')";

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

	$sql = ("SELECT id FROM imagen ORDER BY id DESC LIMIT 1;");
	$query = $bdd->prepare( $sql );
	$query->execute();
	$resultado = $query->fetch(PDO::FETCH_OBJ);

	$imagenes = $resultado === false ? 1 : $resultado->id;

	$sql = "INSERT INTO categorias(nombreCategoria,prioridad,habilitar,idImagen,idCiclo) VALUES ('$nombres','$prioridad','$habilitar','$imagenes','$idCiclo')";

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

echo"<form action='extraexcolar.php' method='POST' name='formulario'>";//form con el valor del id del proveedor, con el metodo post y el envio de datos a la campra con el proveedor
echo"<input type='text' name='idProve' value=".'como'.">";
echo"</form>";

?>

<!--uso de scrip para dar click automatico al envio del form sin que el usuario de confirmar-->
<script>
    window.addEventListener("load",function(){
		formulario = document.formulario;
		idProve = document.formulario.idProve;
		campoError = document.getElementById("error");
		
		idProve.addEventListener("input",function(){
			campoError.innerHTML= "";
		});
		idProve.addEventListener("change",envioAutomatico);
	});

	function enviarFormulario(e){
		e = e || window.event;	//compatibilidad explorer
		if(idProve.value==""){ 
			e.preventDefault(); // parar la ejecución por defecto del evento.
			campoError.innerHTML ="rellene este campo";
		}else{
			console.log("se ha procedio al envío del formulario");
		};
	};

    function envioAutomatico(){
		formulario.addEventListener("submit",enviarFormulario);
		formulario.submit();
	}

    window.onload = function envioAutomatico(){//activa el envio automatico del valor post
		formulario.addEventListener("submit",enviarFormulario);
		formulario.submit();
	}
</script>