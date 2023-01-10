<?php

include('../app/config/config.php');

if (isset($_POST['title']) && isset($_POST['descripcion']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['respons'])) {

  $title = $_POST['title'];
  $descripcion = $_POST['descripcion'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $color = $_POST['color'];
  $respons = $_POST['respons'];

  $tipo = "";

  if ($color == "#0071c5") {
    $tipo = "Modalidad Academica";
  } else if ($color == "#40E0D0") {
    $tipo = "Conferencia y/o platica";
  } else if ($color == "#008000") {
    $tipo = "Congreso, Seminario, Etc.";
  } else if ($color == "#FFD700") {
    $tipo = "Curso y/o taller";
  } else if ($color == "#FF8C00") {
    $tipo = "Concurso de ciencias basicas";
  } else if ($color == "#FF0000") {
    $tipo = "Creatividad e innovacion";
  } else if ($color == "#000") {
    $tipo = "Concurso de emprendedurismo";
  } else if ($color == "#c0392b") {
    $tipo = "Diseño de prototipos";
  } else if ($color == "#8e44ad") {
    $tipo = "Diseño de software";
  } else if ($color == "#2c3e50") {
    $tipo = "Diseño de proyectos";
  }



  $sql = "INSERT INTO events(title, descripcion, start, end, color, respons, tipo) values ('$title','$descripcion', '$start', '$end', '$color', '$respons', '$tipo')";

  echo $sql;

  $query = $bdd->prepare($sql);
  if ($query == false) {
    print_r($bdd->errorInfo());
    die('Erreur prepare');
  }
  $sth = $query->execute();
  if ($sth == false) {
    print_r($query->errorInfo());
    die('Erreur execute');
  }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
