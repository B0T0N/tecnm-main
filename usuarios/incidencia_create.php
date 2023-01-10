<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include ('../app/config/config.php');

if (isset($_POST['motivo']) && isset($_POST['categoria']) && isset($_POST['prioridad']) && isset($_POST['id_alumno']) && isset($_POST['incidencia'])){
	
	$motivo=$_POST['motivo'];
    $categoria=$_POST['categoria'];
    $prioridad =$_POST['prioridad'];
    //$matricula =$_POST['matricula'];
	$id_alumno = $_POST['id_alumno'];
	$incidencia = $_POST['incidencia'];
    $actualiza = $_POST['motivoac'];

$mail = new PHPMailer(true);

try{
    $mail ->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail ->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fxrfxn4@gmail.com';
    $mail->Password = 'syacuhqgbmqcccnr';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

//
    $mail->setFrom ('fxrfxn4@gmail.com','INSTITUTO TECNOLOGICO DE CHINA');
    $mail->addAddress('danielfarfantecnm@gmail.com');


    $mail->isHTML(true);
    $mail->Subject = 'Prueba de registro de incidencia';
    $mail->Body = $motivo.$categoria.$id_alumno;
    $mail->send();

    echo 'Correo enviado con exito';
}catch(Exception $e){
    echo 'El mensaje no se ha enviado'.$mail->ErrorInfo;
}


 $sql= "INSERT INTO tb_incidencia(motivo,categoria,prioridad,id_alumno,Estado,motivo_actualizacion) VALUES ('$motivo','$categoria','$prioridad','$id_alumno','$incidencia','$actualiza')";

	
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
