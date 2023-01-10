<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 2) {
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
    <title>Agregar Crédito Complementario</title>
    <link rel="stylesheet" href="../css/style_maestro.css">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menuuser.php'); ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- cierre sesion por inactividad -->
        <?php if ($_SESSION["ultimoAcceso"] >= 600) {
          echo ("<meta http-equiv='refresh' content='600'>");
        } ?>
        <section class="content-header">
          <h1>
            SISTEMA DE CRÉDITOS COMPLEMENTARIOS
            <small>Agregar Crédito Complementario</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Agregar Crédito Complementario</div>
            <div class="panel-body">
              <!-- TABLA DE LAS ACTIVIDADES -->
              <table class="table table-bordered table-hover table-condensed">

                <thead>
                  <tr>
                    <th>Actividad</th>
                    <th>Descripción</th>
                    <th>Crédito por actividad</th>
                    <th>Máximo acumular</th>
                    <th>Subir archivo</th </tr>
                </thead>
                <!-- FILA 1 DE MODALIDAD ACADEMICA-->
                <tr>
                  <td>Movilidad Acádemica</td>
                  <td>Estancias en instituciones educativas de nivel superior,
                    centros de investigación, y empresas (al menos durante 4 semanas nacional).</td>
                  <td>1.0</td>
                  <td>2.0</td>
                  <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#movilidad-academica">
                      Cargar Archivo
                    </button>
                  </td>
                </tr>
                <!-- FILA 2 DE MODALIDAD ACADEMICA-->

                <tr>
                  <td>Movilidad Acádemica</td>
                  <td>Estancias en instituciones educativas de
                    nivel superior, centros de investigación,
                    y empresas (al menos durante 4 Semanas
                    Internacional).</td>
                  <td>2.0</td>
                  <td>2.0</td>
                  <td><button type=" button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#movilidad-academica2">
                      Cargar Archivo
                    </button>
                  </td>
                </tr>


                <!-- FILA DE CONFERENCIA Y PLATICA -->
                <tr>
                  <td>Conferencia y/o Plática</td>
                  <td>Asistencia o participación dentro o
                    fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional)
                    relacionada con el profesional</td>
                  <td>0.2</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#conferencia-platica">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE CONGRESO, SEMINARIO, ETC. -->
                <tr>
                  <td>Congreso, Seminario, Simposio y/o Coloquio</td>
                  <td>Asistencia o participacion dentro o fuera del instituto
                    en cualquier nivel que se trate, (local, regional, nacional)
                    relacionada con el profesional</td>
                  <td>0.4</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#congreso-seminario">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE CONSURSO O TALLER -->
                <tr>
                  <td>Curso y/o curso taller</td>
                  <td>Participación o impartición dentro o fuera de la institución en cualquier nivel que se trate, (local, regional, nacional)
                    relacionado con el perfil profesional, con una duración mínima de 20 horas (presencial o a distancia)</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#curso-taller">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE DIPLOMADO -->
                <tr>
                  <td>Diplomado</td>
                  <td>Participación o impartición dentro o fuera del instituto en cualquier nivel que se trate, (local, regional, nacional)
                    relacionado con el perfil profesional, con una duración mínima de 90 horas (presencial o a distancia)</td>
                  <td>2.0</td>
                  <td>2.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#diplomado">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 1 DE CONCURSO NACIONAL DE CIENCIAS BASICAS -->
                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencias básicas como seleccionado de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Ciencias-Básicas">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 2 DE CONCURSO NACIONAL DE CIENCIAS BASICAS -->
                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Ciencias-Básicas2">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 3 DE CONCURSO NACIONAL DE CIENCIAS BASICAS -->
                <tr>
                  <td>Concurso Nacional de Ciencias Básicas</td>
                  <td>Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Ciencias-Básicas3">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 1 DE CONCURSO DE CREATIVIDAD E INNOVACIÓN -->
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Creatividad">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 2 DE CONCURSO DE CREATIVIDAD E INNOVACIÓN -->
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Creatividad2">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 3 DE CONCURSO DE CREATIVIDAD E INNOVACIÓN -->
                <tr>
                  <td>Concurso de Creatividad e innovación</td>
                  <td>Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Creatividad3">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 1 DE CONCURSO DE EMPRENDEDURISMO -->
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel local</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#emprendedurismo">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 2 DE CONCURSO DE EMPRENDEDURISMO -->
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel regional</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#emprendedurismo2">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA 3 DE CONCURSO DE EMPRENDEDURISMO  -->
                <tr>
                  <td>Concurso de emprendedurismo</td>
                  <td>Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel nacional</td>
                  <td>1.0</td>
                  <td>2.0</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#emprendedurismo3">
                      Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE DISEÑO DE PROTOTIPOS -->
                <tr>
                  <td>Diseño de Prototipos</td>
                  <td>Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional</td>
                  <td>0.75</td>
                  <td>1.5</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Prototipos">Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE DISEÑO DE SOFTWARE -->
                <tr>
                  <td>Diseño de Software</td>
                  <td>Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional</td>
                  <td>0.75</td>
                  <td>1.5</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Software">Cargar Archivo
                    </button></td>
                </tr>
                <!-- FILA DE DISEÑO EN PROYECTO -->
                <tr>
                  <td>Diseño en proyecto</td>
                  <td>Participar en un proyecto de producción, vinculación e investigación previamente autorizado de acuerdo a su perfil profesional realizando las actividades programadas, al menos durante 40 horas</td>
                  <td>0.5</td>
                  <td>1.0</td>
                  <td>
                    <button type="button" class="btn btn-info btn-lg btn-succes" data-toggle="modal" data-target="#diseño-proyecto">Cargar Archivo
                    </button>
                  </td>
                </tr>
              </table>
            </div>


            <!-- MODALES PARA CAPTURA DATOS COMO EL ARCHIVO, EL ID DEL EVENTO, Y LA MATRICULA DEL ALUMNO -->
            <!-- 1movilidad academica 1 -->

            <div class="modal fade" id="movilidad-academica" tabindex="-1" role="dialog" aria-labelledby="movilidad-academica">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="movilidad-academica">Cargar Archivo</h4>
                  </div>
                  <div class="modal-body">
                    <form action="cargas/Movilidad-Academica.php" method="post" enctype="multipart/form-data">
                      <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
                      <?php
                      $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '1'";
                      $res = mysqli_query($conexion, $consulta1)  ?>
                      <?php foreach ($res as $opcion) : ?>

                        <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


                      <?php endforeach ?>


                      <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
                      <input type="file" name="archivo" required>
                      <br>

                      <label for="responsable">Seleccionar Evento</label> <br>
                      <select name="evento" id="evento" class="form-control" required>
                        <option value="" disabled selected>Selecciona un evento</option>
                        <?php

                        $consulta = "SELECT id, title FROM events WHERE tipo = 'Modalidad academica'";
                        $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                        ?>

                        <?php foreach ($ejecutar as $opciones) : ?>

                          <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                          </option>


                        <?php endforeach ?>
                      </select>

                      <br><br>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-success">Subir Archivo</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- 2movilidad academica 2 -->

          <div class="modal fade" id="movilidad-academica2" tabindex="-1" role="dialog" aria-labelledby="movilidad-academica">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="movilidad-academica">Cargar Archivo</h4>
                </div>
                <div class="modal-body">
                  <form action="cargas/Movilidad-Academica.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
                    <?php
                    $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '2'";
                    $res = mysqli_query($conexion, $consulta1)  ?>
                    <?php foreach ($res as $opcion) : ?>

                      <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


                    <?php endforeach ?>
                    <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
                    <input type="file" name="archivo" required>
                    <br>

                    <label for="responsable">Seleccionar Evento</label> <br>
                    <select name="evento" id="evento" class="form-control" required>
                      <option value="" disabled selected>Selecciona un evento</option>
                      <?php

                      $consulta = "SELECT id, title FROM events WHERE tipo = 'Modalidad academica'";
                      $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                      ?>

                      <?php foreach ($ejecutar as $opciones) : ?>

                        <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                        </option>


                      <?php endforeach ?>
                    </select>

                    <br><br>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success">Subir Archivo</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
      </div>

      <!-- 3coferencia platica -->
      <div class="modal fade" id="conferencia-platica" tabindex="-1" role="dialog" aria-labelledby="conferencia-platica">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="conferencia-platica">Cargar Archivo</h4>
            </div>
            <div class="modal-body">
              <form action="cargas/conferencia-platica.php" method="post" enctype="multipart/form-data">
                <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
                <?php
                $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '3'";
                $res = mysqli_query($conexion, $consulta1)  ?>
                <?php foreach ($res as $opcion) : ?>

                  <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


                <?php endforeach ?>
                <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
                <input type="file" name="archivo" required>
                <br>

                <label for="responsable">Seleccionar Evento</label> <br>
                <select name="evento" id="evento" class="form-control" required>
                  <option value="" disabled selected>Selecciona un evento</option>
                  <?php

                  $consulta = "SELECT id, title FROM events WHERE tipo = 'Conferencia y/o platica'";
                  $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                  ?>

                  <?php foreach ($ejecutar as $opciones) : ?>

                    <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                    </option>


                  <?php endforeach ?>
                </select>

                <br><br>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success">Subir Archivo</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- 4congreso -->
    <div class="modal fade" id="congreso-seminario" tabindex="-1" role="dialog" aria-labelledby="congreso-seminario">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="congreso-seminario">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/congreso-seminario.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '4'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Congreso, Seminario, Etc.'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- 5curso taller -->
    <div class="modal fade" id="curso-taller" tabindex="-1" role="dialog" aria-labelledby="curso-taller">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="curso-taller">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/curso taller.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '5'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Curso y/o taller'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- 6diplomado -->
    <div class="modal fade" id="diplomado" tabindex="-1" role="dialog" aria-labelledby="diplomado">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="diplomado">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Diplomado.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '6'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'diplomado'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 7ciencias basicas 1 -->
    <div class="modal fade" id="Ciencias-Básicas" tabindex="-1" role="dialog" aria-labelledby="Ciencias-Básicas">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Ciencias-Básicas">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Ciencias Básicas.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '7'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de ciencias basicas'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- 8ciencias basicas 2 -->
    <div class="modal fade" id="Ciencias-Básicas2" tabindex="-1" role="dialog" aria-labelledby="Ciencias-Básicas2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Ciencias-Básicas">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Ciencias Básicas.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '8'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de ciencias basicas'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- 9ciencias basicas 3 -->
    <div class="modal fade" id="Ciencias-Básicas3" tabindex="-1" role="dialog" aria-labelledby="Ciencias-Básicas3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Ciencias-Básicas">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Ciencias Básicas.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '9'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de ciencias basicas'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 10creatividad 1-->
    <div class="modal fade" id="Creatividad" tabindex="-1" role="dialog" aria-labelledby="Creatividad">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Creatividad e innovación.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '10'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Creatividad e innovacion'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 11creatividad 2-->
    <div class="modal fade" id="Creatividad2" tabindex="-1" role="dialog" aria-labelledby="Creatividad">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Creatividad e innovación.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '11'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Creatividad e innovacion'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 12creatividad 3-->
    <div class="modal fade" id="Creatividad3" tabindex="-1" role="dialog" aria-labelledby="Creatividad">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Creatividad e innovación.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '12'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Creatividad e innovacion'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 12emprendedurismo 1 -->
    <div class="modal fade" id="emprendedurismo" tabindex="-1" role="dialog" aria-labelledby="emprendedurismo">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/emprendedurismo.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '13'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de emprendedurismo'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 13emprendedurismo 2 -->
    <div class="modal fade" id="emprendedurismo2" tabindex="-1" role="dialog" aria-labelledby="emprendedurismo">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/emprendedurismo.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '14'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de emprendedurismo'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 14emprendedurismo 3 -->
    <div class="modal fade" id="emprendedurismo3" tabindex="-1" role="dialog" aria-labelledby="emprendedurismo">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Creatividad">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/emprendedurismo.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '15'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Concurso de emprendedurismo'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 15prototipos -->

    <div class="modal fade" id="Prototipos" tabindex="-1" role="dialog" aria-labelledby="Prototipos">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Prototipos">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Prototipos.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '16'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Diseño de prototipos'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 16software -->
    <div class="modal fade" id="Software" tabindex="-1" role="dialog" aria-labelledby="Software">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Software">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Software.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '17'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Diseño de software'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- 17diseño proyecto -->
    <div class="modal fade" id="diseño-proyecto" tabindex="-1" role="dialog" aria-labelledby="diseño-proyecto">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="diseño-proyecto">Cargar Archivo</h4>
          </div>
          <div class="modal-body">
            <form action="cargas/Diseño-proyecto.php" method="post" enctype="multipart/form-data">
              <input type="text" name="numero_control" value="<?php echo $sesion_usuario['numero_control'] ?>" style="display:none">
              <?php
              $consulta1 = "SELECT credito_activ FROM actividades WHERE id_act = '18'";
              $res = mysqli_query($conexion, $consulta1)  ?>
              <?php foreach ($res as $opcion) : ?>

                <input type="text" name="credit" value="<?php echo $opcion['credito_activ'] ?>" placeholder="<?php echo $opcion['credito_activ'] ?>" style="display:none">


              <?php endforeach ?>
              <input type="text" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno'] ?>" style="display:none">
              <input type="file" name="archivo" required>
              <br>

              <label for="responsable">Seleccionar Evento</label> <br>
              <select name="evento" id="evento" class="form-control" required>
                <option value="" disabled selected>Selecciona un evento</option>
                <?php

                $consulta = "SELECT id, title FROM events WHERE tipo = 'Diseño de proyectos'";
                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                ?>

                <?php foreach ($ejecutar as $opciones) : ?>

                  <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['title'] ?>
                  </option>


                <?php endforeach ?>
              </select>

              <br><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Subir Archivo</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('../layout/footer.php'); ?>
    <?php include('../layout/footer_links.php'); ?>




  </body>

  </html>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
?>