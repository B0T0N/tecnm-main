<?php
//$conexion = mysqli_connect("bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com", "utur7aovmczn6qtf", "Pp83ju823IBh0nmPhQ9v", "bxgvbqru5r7prhsdpnvr");

$conexion = mysqli_connect("bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com", "uapkjgg1v9wsmgng", "bftdNJiNdcIo05v5dJRs", "bicxita7oa0kn6veyzi8");
?>


<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 01/07/2020
 * Time: 16:41
 */

/*
define('SERVIDOR', 'bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com');
define('USUARIO', 'utur7aovmczn6qtf');
define('PASSWOD', 'Pp83ju823IBh0nmPhQ9v');
define('BD', 'bxgvbqru5r7prhsdpnvr');
*/
define('SERVIDOR', 'bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com');
define('USUARIO', 'uapkjgg1v9wsmgng');
define('PASSWOD', 'bftdNJiNdcIo05v5dJRs');
define('BD', 'bicxita7oa0kn6veyzi8');

//$URL = 'http://localhost/tecnm';

$URL = 'mysql://uapkjgg1v9wsmgng:bftdNJiNdcIo05v5dJRs@bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com:3306/bicxita7oa0kn6veyzi8';
//$URL = 'http://localhost/tecnm';

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
  $pdo = new PDO($servidor, USUARIO, PASSWOD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  // echo "<script>alert('La conexión a la base de datos fue exitosa.')</script>";
} catch (PDOException $e) {
  echo "<script>alert('Error a la conexión con la base de datos')</script>";
}
?>

<?php
/*
$server = "bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com";
$user = "utur7aovmczn6qtf";
$pass = "Pp83ju823IBh0nmPhQ9v";
$bd = "bxgvbqru5r7prhsdpnvr";

$conect = new mysqli($server, $user, $pass, $bd);
?>
<?php
$database = "bxgvbqru5r7prhsdpnvr";
$user = 'utur7aovmczn6qtf';
$password = 'Pp83ju823IBh0nmPhQ9v';


try {

  $con = new PDO('mysql:host=bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com;dbname=' . $database, $user, $password);
} catch (PDOException $e) {
  echo "Error" . $e->getMessage();
}
*/
$server = "bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com";
$user = "uapkjgg1v9wsmgng";
$pass = "bftdNJiNdcIo05v5dJRs";
$bd = "bicxita7oa0kn6veyzi8";

$conect = new mysqli($server, $user, $pass, $bd);
?>
<?php
$database = "bicxita7oa0kn6veyzi8";
$user = 'uapkjgg1v9wsmgng';
$password = 'bftdNJiNdcIo05v5dJRs';


try {

  $con = new PDO('mysql:host=bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com;dbname=' . $database, $user, $password);
} catch (PDOException $e) {
  echo "Error" . $e->getMessage();
}
?>
<?php
/*
try {
  $bdd = new PDO('mysql:host=bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com;dbname=bxgvbqru5r7prhsdpnvr;charset=utf8', 'utur7aovmczn6qtf', 'Pp83ju823IBh0nmPhQ9v');
} catch (Exception $e) {
  die('Error : ' . $e->getMessage());
}
*/
try {
  $bdd = new PDO('mysql:host=bicxita7oa0kn6veyzi8-mysql.services.clever-cloud.com;dbname=bicxita7oa0kn6veyzi8;charset=utf8', 'uapkjgg1v9wsmgng', 'bftdNJiNdcIo05v5dJRs');
} catch (Exception $e) {
  die('Error : ' . $e->getMessage());
}
