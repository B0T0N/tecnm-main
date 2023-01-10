<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario'])) {
  //echo "existe sesión";
  //echo "bienvenido usuario";
  $correo_sesion = $_SESSION['u_usuario'];
  $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
}
foreach ($sesion_usuarios as $sesion_usuario) {
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
  $privilegio = $sesion_usuario['cargo'];
}

//control de inactividad
$ahora = date("Y-n-j H:i:s");
$fechaGuardada = $_SESSION["ultimoAcceso"];
$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

if ($tiempo_transcurrido >= 600) {
  //si pasaron 10 minutos o más
  session_destroy(); // destruyo la sesión
  header('location:../index.php'); //envío al usuario a la pag. de autenticación
  //sino, actualizo la fecha de la sesión
} else {
  $_SESSION["ultimoAcceso"] = $ahora;
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include('../layout/head.php'); ?>
  <title>Perfil</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    if ($privilegio == "0") {
      include('../layout/menu.php');
    } else if ($privilegio == "2") {
      include('../layout/menuuser.php');
    } else if ($privilegio == "1") {
      include('../layout/menumaestro.php');
    }
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- cierre sesion por inactividad -->
      <?php if ($_SESSION["ultimoAcceso"] >= 600) {
        echo ("<meta http-equiv='refresh' content='600'>");
      } ?>
      <section class="content-header">
        <h1>
          SISTEMA DE CRÉDITOS COMPLEMENTARIOS
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Perfil</h3>
              </div>
              <div class="panel-body">
                <form action="controlador_editar.php" method="post" enctype="multipart/form-data">
                  <div class="row">


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> NOMBRE(S)</label>
                        <input type="text" class="form-control" name="nombres" type="text" value="<?php echo $sesion_usuario['nombres']; ?>" required style="text-transform: uppercase;" tabindex="1" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO MATERNO</label>
                        <input type="text" class="form-control" name="ap_materno" value="<?php echo $sesion_usuario['ap_materno']; ?>" required style="text-transform: uppercase;" tabindex="3" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-check"></i> NÚMERO DE CONTROL</label>
                        <input type="text" class="form-control" name="numero_control" value="<?php echo $sesion_usuario['numero_control']; ?>" required style="text-transform: uppercase;" tabindex="5" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-envelope"></i> CORREO INSTITUCIONAL</label>
                        <input type="email" class="form-control" name="correo" value="<?php echo $sesion_usuario['correo']; ?>" required tabindex="7" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-calendar"></i> FECHA DE NACIMIENTO</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $sesion_usuario['fecha_nacimiento']; ?>" required tabindex="9">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-phone"></i> TELÉFONO</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $sesion_usuario['telefono']; ?>" required tabindex="11">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-equalizer"></i> CIUDAD O LOCALIDAD</label>
                        <input type="text" class="form-control" name="entidad" value="<?php echo $sesion_usuario['entidad']; ?>" required style="text-transform: uppercase;" tabindex="13">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i>CALLE</label>
                        <input type="text" class="form-control" name="calle" value="<?php echo $sesion_usuario['calle']; ?>" required style="text-transform: uppercase;" tabindex="15">
                      </div>
                        <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> Nivel Escolar</label>
                        <select name="nivel_escolar" id="" class="form-control" required>
                          <option value="Seleccione opción"><?php echo $sesion_usuario['nivel_escolar']; ?>ELIGIR UNA OPCIÓN</option>
                          <option value="Primaria">Primaria</option>
                          <option value="Secundaria">Secundaria</option>
                          <option value="Preparatoria">Preparatoria</option>
                          <option value="Licenciatura">Licenciatura</option>
                          <option value="Maestría">Maestría</option>
                          <option value="Doctorado">Doctorado</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-picture"></i> FOTO DE PERFIL</label>
                        <input type="file" class="form-control" id="file" name="file" tabindex="22">
                        <center>
                          <br>
                          <output id="list" style="margin-top: 0px"></output>
                        </center>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO PATERNO</label>
                        <input type="text" class="form-control" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno']; ?>" required style="text-transform: uppercase;" tabindex="2" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> SEXO</label>
                        <select name="sexo" id="" class="form-control" required style="text-transform: uppercase;" tabindex="4">
                          <option value="elegir"><?php echo $sesion_usuario['sexo']; ?></option>
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                          <option value="Mujer">Otro</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-book"></i> CARRERA</label>
                        <select name="carrera" id="" class="form-control" value="<?php echo $sesion_usuario['carrera']; ?>" required style="text-transform: uppercase;" tabindex="6">
                          <option value="elegir"><?php echo $sesion_usuario['carrera']; ?></option>
                          <option value="Ingeneria en Agronomia">Ingeniería en Agronomía</option>
                          <option value="Ingeneria Forestal">Ingeniería Forestal</option>
                          <option value="Infeneria en Industrias Alimentarias">Ingeniería en Industrias Alimentarias</option>
                          <option value="Licenciatura en Biologia">Licenciatura en Biología</option>
                          <option value="Ingeneria Informatica">Ingeniería Informática</option>
                          <option value="Ingeneria en Administracion">Ingeniería en Administración </option>
                          <option value="Infeneria en Gestion Empresarial">Ingeniería en Gestión Empresarial</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-modal-window"></i> ESTADO CIVIL</label>
                        <select name="estado_civil" id="" class="form-control" required style="text-transform: uppercase;" tabindex="8">
                          <option value="elegir"><?php echo $sesion_usuario['estado_civil']; ?></option>
                          <option value="Soltero/a">Soltero/a</option>
                          <option value="Casado/a">Casado/a</option>
                          <option value="Unión libre">Unión libre</option>
                          <option value="Separado/a">Separado/a</option>
                          <option value="Divorciado/a">Divorciado/a</option>
                          <option value="Viudo/a">Viudo/a</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-link"></i> CURP</label>
                        <input type="text" class="form-control" name="curp" value="<?php echo $sesion_usuario['curp']; ?>" required style="text-transform: uppercase;" tabindex="10">
                      </div>

                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i> ESTADO</label>
                        <select name="ciudad" id="" class="form-control" required style="text-transform: uppercase;" tabindex="12">
                          <option value="elegir">Elegir una Opción</option>
                          <option value="Aguascalientes">Aguascalientes</option>
                          <option value="Baja California">Baja California</option>
                          <option value="Baja California Sur">Baja California Sur</option>
                          <option value="Campeche">Campeche</option>
                          <option value="Chiapas">Chiapas</option>
                          <option value="Chihuahua">Chihuahua</option>
                          <option value="CDMX">Ciudad de México</option>
                          <option value="Coahuila">Coahuila</option>
                          <option value="Colima">Colima</option>
                          <option value="Durango">Durango</option>
                          <option value="Estado de México">Estado de México</option>
                          <option value="Guanajuato">Guanajuato</option>
                          <option value="Guerrero">Guerrero</option>
                          <option value="Hidalgo">Hidalgo</option>
                          <option value="Jalisco">Jalisco</option>
                          <option value="Michoacán">Michoacán</option>
                          <option value="Morelos">Morelos</option>
                          <option value="Nayarit">Nayarit</option>
                          <option value="Nuevo León">Nuevo León</option>
                          <option value="Oaxaca">Oaxaca</option>
                          <option value="Puebla">Puebla</option>
                          <option value="Querétaro">Querétaro</option>
                          <option value="Quintana Roo">Quintana Roo</option>
                          <option value="San Luis Potosí">San Luis Potosí</option>
                          <option value="Sinaloa">Sinaloa</option>
                          <option value="Sonora">Sonora</option>
                          <option value="Tabasco">Tabasco</option>
                          <option value="Tamaulipas">Tamaulipas</option>
                          <option value="Tlaxcala">Tlaxcala</option>
                          <option value="Veracruz">Veracruz</option>
                          <option value="Yucatán">Yucatán</option>
                          <option value="Zacatecas">Zacatecas</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i> COLONIA</label>
                        <input type="text" class="form-control" name="colonia" value="<?php echo $sesion_usuario['colonia']; ?>" required style="text-transform: uppercase;" tabindex="14">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-equalizer"></i> CÓDIGO POSTAL</label>
                        <input type="text" class="form-control" name="codigo_postal" value="<?php echo $sesion_usuario['codigo_postal']; ?>" required tabindex="16">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> CRÉDITO ACADEMICO</label>
                        <input type="text" class="form-control" tabindex="18" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> CRÉDITO EXTRAESCOLAR</label>
                        <input type="text" class="form-control" tabindex="20" disabled>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> CRÉDITO TUTORIA</label>
                        <input type="text" class="form-control" tabindex="21" disabled>
                      </div>
                      <br>
                      <div class="form-group">
                        <center>
                          <a href="index.php" class="btn btn-danger btn-lg">Cancelar</a>
                          <input type="submit" class="btn btn-primary btn-lg" value="Actualizar">
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
  <?php include('../layout/footer.php'); ?>
  <?php include('../layout/footer_links.php'); ?>




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
      reader.onload = (function(theFile) {
        return function(e) {
          // Insertamos la imagen
          document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('file').addEventListener('change', archivo, false);
</script>
