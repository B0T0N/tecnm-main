<?php
include ('../app/config/config.php');
session_start();


if(!isset($_GET["id"])) exit();//preguntando si el metodo get tiene un valor, si no tiene uno sale del porceso
    $id = $_GET["id"];

    $sql = "SELECT * FROM categorias WHERE id = ?;";
    $red = $bdd->prepare($sql);
    $red->execute([$id]);
    $campitosos = $red->fetch(PDO::FETCH_LAZY);

    $campor=$campitosos['id'];
   


if(isset($_SESSION['u_usuario'])){
    //echo "existe sesión";
    //echo "bienvenido usuario";
$correo_sesion = $_SESSION['u_usuario'];
    $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
    $query_sesion->execute();
    $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($sesion_usuarios as $sesion_usuario){
        $id_sesion = $sesion_usuario['id'];
         $id_nombres = $sesion_usuario['nombres'];
        $id_ap_paterno = $sesion_usuario['ap_paterno'];
        $id_ap_materno = $sesion_usuario['ap_materno'];
         $id_sexo = $sesion_usuario['sexo'];
         $id_numero_control = $sesion_usuario['numero_control'];
         $id_carrera = $sesion_usuario['carrera'];
         $id_correo = $sesion_usuario['correo'];
         $id_estado_civil = $sesion_usuario['estado_civil'];
         $id_telefono = $sesion_usuario['telefono'];
         $id_ciudad = $sesion_usuario['ciudad'];
         $id_colonia = $sesion_usuario['colonia'];
         $id_calle = $sesion_usuario['calle'];
         $id_codigo_postal = $sesion_usuario['codigo_postal'];
         $id_curp = $sesion_usuario['curp'];
         $id_fecha_nacimiento = $sesion_usuario['fecha_nacimiento'];
         $id_nivel_escolar = $sesion_usuario['nivel_escolar'];
         $id_reticula = $sesion_usuario['reticula'];
         $id_entidad = $sesion_usuario['entidad'];
         $id_foto_perfil = $sesion_usuario['foto_perfil'];
       
    }
    

    

?>

<!DOCTYPE html>
<html>
<head>
  <?php include ('../layout/head.php'); ?>
  <title>Agregar Tutoriado</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ('../layout/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SISTEMA DE ACTIVIDADES EXTRAESCOLARES
        <small>Agregar actividad extraescolar</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
		    <div class="col-md-12">
	         <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Agregar extraescolar <?php echo "".$campor?> </h3>
               </div>
              <div class="panel-body">
                <form action="actividadCreate.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Nombre de actividad</label> 
                        <input type="text" class="form-control" name="nombreActividad" required  style="text-transform:uppercase;">
                      </div>

                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Horas a cumplir la actividad</label> 
                        <input type="text" class="form-control" name="horaActividad" required >
                      </div>

                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-check"></i>Dias a cumplir la actividad</label>
                        <br>
                        <input name="lunes" value="lunes" id="lunes" type="checkbox" ><label for="lunes">Lunes</label>
                        <input name="martes" value="martes" id="martes" type="checkbox"><label for="martes">Martes</label>
                        <input name="miercoles" value="miercoles" id="miercoles" type="checkbox" ><label for="miercoles">Miercoles</label>
                        <input name="jueves" value="jueves" id="jueves" type="checkbox"><label for="jueves">Jueves</label>
                        <input name="viernes" value="viernes" id="viernes" type="checkbox" ><label for="viernes">Viernes</label>
                      </div>
                      
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-book"></i>Horas de actividad</label>
                        <input type= "time" name="horaHacer" required >
                        <!--<input type="text" class="form-control" name="horaHacer" required style="text-transform:uppercase;">-->
                      </div>

                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i>Encargado</label> 
                        <input type="text" class="form-control" name="encargadoActividad"  style="text-transform:uppercase;">
                      </div>
                      
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-book"></i>Lugar de actividad</label> 
                        <select name="lugarActividad">
                          <option value="">Seleccione</option>
                          <option value="CampoFutbol">Campo de futbol</option>
                          <option value="Cancha">Cancha usos multiples</option>
                          <option value="biblioteca">Biblioteca</option>
                          <option value="beisbol">Campo Beisbol</option>
                        </select>
                        <br>
                        <label for=""><i class="glyphicon glyphicon-user"></i>Otros</label> 
                        <input type="text" class="form-control" name="otroActividad" id="" style="text-transform:uppercase;">
                        <input type="hidden" name="idCampo" value="<?php echo $campor?>" style="text-transform:uppercase;">
                      </div>

                      <div class="col-md-6">

                        <br>
                        <div class="form-group">
                          <center>
                            <a href="actividadesCampo.php" class="btn btn-danger btn-lg">Cancelar</a>
                            <input type="submit" class="btn btn-primary btn-lg" value="Registrar" style="text-transform:uppercase;">
                          </center>
                        </div>

                      </div>
                    </div>
                  </div>
		            </form>
		   
		    </div>
			</div>
        </div>
	  </div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include ('../layout/footer.php'); ?>
  <?php include ('../layout/footer_links.php'); ?>




</body>
</html>
<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>
<?php
}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}