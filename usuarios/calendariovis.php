<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 1 ) {
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
  $sql = "SELECT id, title, start, descripcion, end, color, respons FROM events ";

  $req = $bdd->prepare($sql);
  $req->execute();

  $events = $req->fetchAll();
	
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
  <html lang="es">

  <head>

    <?php include('../layout/head.php'); ?>
    <title>Calendario </title>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menumaestro.php'); ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- cierre sesion por inactividad -->
        <?php if ($_SESSION["ultimoAcceso"] >= 600) {
          echo ("<meta http-equiv='refresh' content='600'>");
        } ?>
        <section class="content-header">
          <h1>
            SISTEMA DE CREDITOS COMPLENTARIOS
            <small>Calendario de Actividades</small>
          </h1>

        </section>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- FullCalendar -->
        <link href='css/fullcalendar.css' rel='stylesheet' />


        <!-- Custom CSS -->

        </head>

        <body>
          <div class="container">

            <div id="calendar" class="col-md-12">
            </div>

            <!-- /.row -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="#.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
					  <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
					</div>
				  </div>
				  <div class="form-group">
				
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				
			  </div>
			</form>
			</div>
		  </div>
		</div> -->



            <!-- Modal -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="editEventTitle.php">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Detalles evento</h4>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label for="title_edit" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                          <input disabled type="text" name="title_edit" class="form-control" id="title_edit" placeholder="Titulo">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="descripcion_edit" class="col-sm-2 control-label">descripcion</label>
                        <div class="col-sm-10">
                          <input disabled type="text" name="descripcion_edit" class="form-control" id="descripcion_edit" placeholder="descripcion">
                        </div>

                      </div>

                      <div class="form-group">
                        <label for="respons" class="col-sm-2 control-label">responsable</label>
                        <div class="col-sm-10">
                          <select name="respons" id="respons" class="form-control" disabled>
                            <?php
                            $consulta = "SELECT id, nombres FROM tb_usuarios WHERE cargo = 1";
                            $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                            ?>

                            <?php foreach ($ejecutar as $opciones) : ?>

                              <option disabled value="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombres'] ?></option>

                            <?php endforeach ?>
                          </select>
                        </div>

                      </div>

                      <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Tipo de evento</label>
                        <div class="col-sm-10">
                          <select disabled name="color" class="form-control" id="color">
                            <option value="">Seleccionar</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Modalidad Academica</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Conferencia y/o platica</option>
                            <option style="color:#008000;" value="#008000">&#9724; Congreso, Seminario, Etc.</option>
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Curso y/o taller</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Concurso de ciencias basicas</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Creatividad e innovacion</option>
                            <option style="color:#000;" value="#000">&#9724; Concurso de emprendedurismo</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Diseño de prototipos</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Diseño de software</option>
                            <option style="color:#008000;" value="#008000">&#9724; Diseño de proyectos</option>

                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <!-- <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label> -->
                          </div>
                        </div>
                      </div>

                      <input type="hidden" name="id" class="form-control" id="id">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
                      </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container -->

          <!-- jQuery Version 1.11.1 -->
          <script src="js/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="js/bootstrap.min.js"></script>

          <!-- FullCalendar -->
          <script src='js/moment.min.js'></script>
          <script src='js/fullcalendar/fullcalendar.min.js'></script>
          <script src='js/fullcalendar/fullcalendar.js'></script>
          <script src='js/fullcalendar/locale/es.js'></script>


          <script>
            $(document).ready(function() {

              var date = new Date();
              var yyyy = date.getFullYear().toString();
              var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
              var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

              $('#calendar').fullCalendar({
                header: {
                  language: 'es',
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,basicWeek,basicDay',

                },
                defaultDate: yyyy + "-" + mm + "-" + dd,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {

                  $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                  $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                  $('#ModalAdd').modal('show');
                },
                eventRender: function(event, element) {
                  element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title_edit').val(event.title);
                    $('#ModalEdit #descripcion_edit').val(event.descripcion);
                    $('#ModalEdit #respons').val(event.respons);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                  });
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position

                  edit(event);

                },
                eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                  edit(event);

                },
                events: [
                  <?php foreach ($events as $event) :

                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if ($start[1] == '00:00:00') {
                      $start = $start[0];
                    } else {
                      $start = $event['start'];
                    }
                    if ($end[1] == '00:00:00') {
                      $end = $end[0];
                    } else {
                      $end = $event['end'];
                    }
                  ?> {
                      id: '<?php echo $event['id']; ?>',
                      title: '<?php echo $event['title']; ?>',
                      descripcion: '<?php echo $event['descripcion']; ?>',
                      respons: '<?php echo $event['respons']; ?>',
                      start: '<?php echo $start; ?>',
                      end: '<?php echo $end; ?>',
                      color: '<?php echo $event['color']; ?>',
                    },
                  <?php endforeach; ?>
                ]
              });

              function edit(event) {
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if (event.end) {
                  end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                  end = start;
                }

                id = event.id;

                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;

                $.ajax({
                  url: 'editEventDate.php',
                  type: "POST",
                  data: {
                    Event: Event
                  },
                  success: function(rep) {
                    if (rep == 'OK') {
                      alert('Evento se ha guardado correctamente');
                    } else {
                      alert('No se pudo guardar. Inténtalo de nuevo.');
                    }
                  }
                });
              }

            });
          </script>

        </body>

  </html>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
