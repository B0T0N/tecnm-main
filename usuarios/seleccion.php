<?php
include ('../app/config/config.php');

$id = $_POST['id'];

$sql = ("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
        $query = $bdd->prepare( $sql );
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_OBJ);

        $idCiclo = $resultado->id;

$queryM = "SELECT id, nombreActividad FROM extraescolar WHERE idCategoria = $id AND idCiclo = $idCiclo";
$resultadoM = $conect->query($queryM);

$html = "<option value=''>SELECCIONE ACTIVIDAD</option>";

while ($rifle = $resultadoM->fetch_assoc()) {
    $html.= "<option value='".$rifle['id']."'>".$rifle['nombreActividad']."</option>";
}

echo $html;

?>