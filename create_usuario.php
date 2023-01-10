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
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SISTEMA DE CREDITOS COMPLENTARIOS
            <small>Agregar usuario</small>
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
                  <form action="controlador.php" method="post" enctype="multipart/form-data">
                    <div class="row">


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Nombres</label>
                          <input type="text" class="form-control" name="nombre" required tabindex="1" maxlength="30" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Materno</label>
                          <input type="text" class="form-control" name="materno" required tabindex="3" maxlength="20" style="text-transform:uppercase;">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-envelope"></i> Correo Institucional</label>
                          <input type="email" class="form-control" name="correo" required tabindex="5" maxlength="30">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-phone"></i> Telefono</label>
                          <input type="number" class="form-control" name="telefono" required tabindex="7" maxlength="10">
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-picture"></i> Foto de Perfil</label>
                          <input type="file" class="form-control" id="file" name="file" tabindex="12">
                          <center>
                            <br>
                            <output id="list" style="margin-top: 0px"></output>
                          </center>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Paterno</label>
                          <input type="text" class="form-control" name="paterno" required tabindex="2" maxlength="20" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Sexo</label>
                          <select name="sexo" id="" class="form-control" tabindex="4" style="text-transform:uppercase;">
                            <option value="elegir">Elegir una Opcion</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-modal-window"></i>Tipo de Usuario</label>
                          <select name="cargo" id="" class="form-control" required tabindex="6" style="text-transform:uppercase;">
                            <option value="elegir"></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Maestro">Maestro</option>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> Nivel Académico</label>
                          <input type="text" class="form-control" name="profesion" required tabindex="8" style="text-transform:uppercase;">
                        </div>
                      </div>
                      <div class="col-md-6">


                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-link"></i> Cargo</label>
                          <!-- <input type="text" class="form-control" name="area" required tabindex="10"> -->
                          <select name="area" id="" class="form-control" required tabindex="6" style="text-transform:uppercase;">
                            <option value="elegir"></option>
                            <option value="DOCENTE">DOCENTE</option>
                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                            <option value="EXTERNO">EXTERNO</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-lock"></i> Contraseña</label>
                          <input type="password" class="form-control" name="contraseña" required tabindex="11" maxlength="15">
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-lock"></i> Confirmar Contraseña</label>
                          <input type="password" class="form-control" required tabindex="11" maxlength="15">
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
  </script>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
