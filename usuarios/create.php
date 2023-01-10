<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0) {
  //echo "existe sesión";
  //echo "bienvenido usuario";
  $correo_sesion = $_SESSION['u_usuario'];
  $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
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
    <title>agregar usuario</title>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menu.php'); ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- cierre sesion por inactividad -->
        <?php if ($_SESSION["ultimoAcceso"] >= 600) {
          echo ("<meta http-equiv='refresh' content='600'>");
        } ?>
        <section class="content-header">
          <h1>
            Agregar usuarios
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Agregar alumno</h3>
                </div>

                <form action="controlador_create.php" method="post" enctype="multipart/form-data" id="formulario">
                  <div class="panel-body">
                    <div class="row">


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> NOMBRE(S)</label>
                          <input type="text" class="form-control" name="nombres" required tabindex="1" style="text-transform:uppercase;" maxlength="30">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO MATERNO</label>
                          <input type="text" class="form-control" name="ap_materno" required tabindex="3" style="text-transform:uppercase;" maxlength="20">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-check"></i> NÚMERO DE CONTROL</label>
                          <input type="text" class="form-control" name="numero_control" required tabindex="5" maxlength="8">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-envelope"></i> CORREO INSTITUCIONAL</label>
                          <input type="email" class="form-control" name="correo" required tabindex="7" maxlength="30">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-calendar"></i> FECHA DE NACIMIENTO</label>
                          <input type="date" class="form-control" name="fecha_nacimiento" required tabindex="9">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-phone"></i> TELÉFONO</label>
                          <input type="text" class="form-control" name="telefono" required tabindex="11" maxlength="10">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-map-marker"></i> COLONIA</label>
                          <input type="text" class="form-control" name="colonia" required tabindex="13" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-map-marker"></i> ENTIDAD FEDERATIVA</label>
                          <select name="ciudad" class="form-control" required tabindex="15" style="text-transform:uppercase;">
                            <option value="" disabled selected>Selecciona tu entidad federativa</option>
                            <option value="AGUASCALIENTES">Aguascalientes</option>
                            <option value="BAJA CALIFORNIA">Baja California</option>
                            <option value="BAJA CALIFORNIA SUR">Baja California Sur</option>
                            <option value="CAMPECHE">Campeche</option>
                            <option value="CHIAPAS">Chiapas</option>
                            <option value="CHIHUAHUA">Chihuahua</option>
                            <option value="CDMX">Ciudad de México</option>
                            <option value="COAHUILA">Coahuila</option>
                            <option value="COLIMA">Colima</option>
                            <option value="DURANGO">Durango</option>
                            <option value="ESTADO DE MEXICO">Estado de México</option>
                            <option value="GUANAJUATO">Guanajuato</option>
                            <option value="GUERRERO">Guerrero</option>
                            <option value="HIDALGO">Hidalgo</option>
                            <option value="JALISCO">Jalisco</option>
                            <option value="MICHOACAN">Michoacán</option>
                            <option value="MORELOS">Morelos</option>
                            <option value="NAYARIT">Nayarit</option>
                            <option value="NUEVO LEON">Nuevo León</option>
                            <option value="OAXACA">Oaxaca</option>
                            <option value="PUEBLA">Puebla</option>
                            <option value="QUERETARO">Querétaro</option>
                            <option value="QUINTANA ROO">Quintana Roo</option>
                            <option value="SAN LUIS POTOSI">San Luis Potosí</option>
                            <option value="SINALOA">Sinaloa</option>
                            <option value="SONORA">Sonora</option>
                            <option value="TABASCO">Tabasco</option>
                            <option value="TAMAULIPAS">Tamaulipas</option>
                            <option value="TLAXCALA">Tlaxcala</option>
                            <option value="VERACRUZ">Veracruz</option>
                            <option value="YUCATAN">Yucatán</option>
                            <option value="ZACATECAS">Zacatecas</option>
                          </select>
                        </div>

                        <!-- <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-equalizer"></i> Entidad</label>
                          <input type="text" class="form-control" name="entidad" required tabindex="17">
                        </div> -->
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-picture"></i> FOTO DE PERFIL</label>
                          <input type="file" class="form-control" id="file" name="file" tabindex="20">
                          <center>
                            <br>
                            <output id="list" style="margin-top: 0px"></output>
                          </center>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO PATERNO</label>
                          <input type="text" class="form-control" name="ap_paterno" required tabindex="2" style="text-transform:uppercase;" maxlength="20">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> SEXO</label>
                          <select name="sexo" class="form-control" tabindex="4" style="text-transform:uppercase;">
                            <option value="" disabled selected>selecciona tu sexo </option>
                            <option value="Hombre">HOMBRE</option>
                            <option value="Mujer">MUJER</option>
                            <option value="Mujer">OTRO</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-book"></i> CARRERA</label>
                          <select name="carrera" class="form-control" required tabindex="6" style="text-transform:uppercase;">
                            <option value="" disabled selected>Selecciona una carrera</option>
                            <?php
                            $consulta1 = "SELECT carrera FROM cat_carreras";
                            $res = mysqli_query($conexion, $consulta1)  ?>
                            <?php foreach ($res as $opcion) : ?>

                              <option value="<?php echo $opcion['carrera'] ?>"><?php echo $opcion['carrera'] ?></option>

                            <?php endforeach ?>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-modal-window"></i> ESTADO CIVIL</label>
                          <select name="estado_civil" class="form-control" required tabindex="8" style="text-transform:uppercase;">
                            <option value="" disabled selected>Selleciona tu estado civil</option>
                            <option value="Soltero/a">SOLTERO/A</option>
                            <option value="Casado/a">CASADO/A</option>
                            <option value="Unión libre">UNIÓN LIBRE</option>
                            <option value="Separado/a">SEPARADO/A</option>
                            <option value="Divorciado/a">DIVORCIADO/A</option>
                            <option value="Viudo/a">VIUDO/A</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> CURP</label>
                          <input type="text" class="form-control" name="curp" required tabindex="10" style="text-transform:uppercase;" maxlength="18">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-map-marker"></i> CALLE</label>
                          <input type="text" class="form-control" name="calle" required tabindex="12" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-equalizer"></i> CÓDIGO POSTAL</label>
                          <input type="text" class="form-control" name="codigo_postal" required tabindex="14" maxlength="5">
                        </div>
                        <!-- <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> Reticula</label>
                          <input type="text" class="form-control" name="reticula" required tabindex="16">
                        </div> -->
                        <!-- <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-education"></i> Nivel Escolar</label>
                          <input type="text" class="form-control" name="nivel_escolar" required>
                        </div> -->
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-lock"></i> CONTRASEÑA</label>
                          <input type="password" class="form-control" name="contraseña" required tabindex="16" maxlength="15" id="contra">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-eye-close"></i> CONFIRMAR CONTRASEÑA</label>
                          <input type="password" class="form-control" required tabindex="17" maxlength="15" name="contraseñaConfirm" id="confirmContra">
                        </div>
                        <br>
                        <div class="form-group">
                          <center>
                            <a href="" class="btn btn-danger btn-lg">Cancelar</a>
                            <input type="submit" class="btn btn-primary btn-lg" value="Registrar">
                          </center>
                        </div>
                      </div>

                    </div>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </section>
      </div>
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

    //-----------
    const contraCorrecta = false;
    const confirmContra = document.getElementById('confirmContra');
    const contra = document.getElementById('contra');
    const formulario = document.getElementById('formulario');

    formulario.addEventListener('submit', (e) => {
      if (contra.value == confirmContra.value) {
        contraCorrecta = true;
      }
      if (contraCorrecta == false) {
        alert('Las contraseñas no coinciden');
        e.preventDefault();
      }
    })
  </script>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
