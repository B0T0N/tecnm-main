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
    <title>Agregar usuario</title>
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
                  <h3 class="panel-title">Agregar Usuario</h3>
                </div>
                <div class="panel-body">
                  <form action="controlador_user.php" method="post" enctype="multipart/form-data" id="formulario">
                    <div class="row">


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> NOMBRE(S)</label>
                          <input type="text" class="form-control" name="nombre" required tabindex="1" maxlength="30" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO MATERNO</label>
                          <input type="text" class="form-control" name="materno" required tabindex="3" maxlength="20" style="text-transform:uppercase;">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-envelope"></i> CORREO INSTITUCIONAL</label>
                          <input type="email" class="form-control" name="correo" required tabindex="5" maxlength="30">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-phone"></i> TELÉFONO</label>
                          <input type="text" class="form-control" name="telefono" required tabindex="7" maxlength="10">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-picture"></i> FOTO DE PERFIL</label>
                          <input type="file" class="form-control" id="file" name="file" tabindex="12">
                          <center>
                            <br>
                            <output id="list" style="margin-top: 0px"></output>
                          </center>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> APELLIDO PATERNO</label>
                          <input type="text" class="form-control" name="paterno" required tabindex="2" maxlength="20" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> SEXO</label>
                          <select name="sexo" class="form-control" tabindex="4" style="text-transform:uppercase;">
                            <option value="" disabled selected>selecciona tu sexo</option>
                            <option value="Hombre">HOMBRE</option>
                            <option value="Mujer">MUJER</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-modal-window"></i>TIPO DE USUARIO</label>
                          <select name="cargo" class="form-control" required tabindex="6" style="text-transform:uppercase;">
                            <option value="" disabled selected>selecciona el tipo de usuario</option>
                            <option value="Administrador">ADMINISTRADOR</option>
                            <option value="Maestro">MAESTRO</option>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> NIVEL ACADÉMIDO</label>
                          <select name="profesion" class="form-control" required tabindex="8" style="text-transform:uppercase">
                            <option value="" disabled selected>selecciona el nivel academico</option>
                            <option value="Preparatoria">PREPARATORIA</option>
                            <option value="Tecnico">TECNICO</option>
                            <option value="Licenciatura">LICENCIATURA</option>
                            <option value="Posgrado">POSGRADO</option>
                            <option value="Doctorado">DOCTORADO</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> CARGO</label>
                          <!-- <input type="text" class="form-control" name="area" required tabindex="10"> -->
                          <select name="area" class="form-control" required tabindex="9" style="text-transform:uppercase;">
                            <option value="" disabled selected>selecciona el cargo</option>
                            <option value="Docente">DOCENTE</option>
                            <option value="Administrativo">ADMINISTRATIVO</option>
                            <option value="Externo">EXTERNO</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-lock"></i> CONTRASEÑA</label>
                          <input type="password" class="form-control" name="contraseña" required tabindex="11" maxlength="15" id="contrauser">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-lock"></i> CONFIRMAR CONTRASEÑA</label>
                          <input type="password" class="form-control" name="contraseñaConfirm" required tabindex="11" maxlength="15" id="contraConfirmUser">
                        </div>

                        <br>
                        <div class="form-group">
                          <center>
                            <a href="create_usuario.php" class="btn btn-danger btn-lg">Cancelar</a>
                            <input type="submit" class="btn btn-primary btn-lg" value="Registrar">
                          </center>
                        </div>
                      </div>

                    </div>


                  </form>
                </div>










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

    //------------

    const contraCorrecta = false;
    const confirmContra = document.getElementById('contraConfirmUser');
    const contra = document.getElementById('contrauser');
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
