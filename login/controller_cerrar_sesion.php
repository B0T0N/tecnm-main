<?php


session_start();

if (isset($_SESSION['u_usuario'])) {
  echo "existe sesión";
  session_destroy();
  header('location:../index.php');
} else {
  //echo "no existe sesión";
}
