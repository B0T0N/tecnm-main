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

  <?php
  /*
$resultado = 0;
$valor = null;
  if(isset($_POST['enviar']))
  {
 $tiempo = $_POST['tiempo'];
 $equipo = $_POST['equipo'];
 $liderazgo = $_POST['liderazgo'];
 $organiza = $_POST['organiza'];
 $realidad = $_POST['realidad'];
 $sugerencias = $_POST['sugerencias'];
 $iniciativa = $_POST['iniciativa'];

    
    $resultado = ($tiempo+$equipo+$liderazgo+$organiza+$realidad+$sugerencias+$iniciativa)/7;
    if($resultado <=4){
      $valor = 'Excelente';
    }
    if($resultado<=3){
      $valor = 'Notable';
    }
    if($resultado<=2){
      $valor = 'Bueno';
    }
    if($resultado<=1){
      $valor = 'Suficiente';
    }
    if($resultado<=0){
      $valor = 'Insuficiente';
    };
 
}*/
  ?>



  <!DOCTYPE html>
  <html>

  <head>
    <?php include('../layout/head.php'); ?>
    <title>Guia de actividades Complementarias</title>
    <link rel="stylesheet" href="../css/StyleNew.css">
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
            SISTEMA DE CREDITOS COMPLEMENTARIOS
            <small>Guia de Actividades Complementarias</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Guia de Actividades Complementarias</div>
            <div class="panel-body">

              <form method="POST" action="cntrlevaluacion_maestro.php">
                <center>
                  <!-- no se usa esta tabla -->
                  <!-- <table>
                    <tr class="fila_matricula">
                      <th class="matricula">Matricula:</th>
                      <th><input type="text" name="matricula" id="matricula_buscar" maxlength="50" class="matricula_input">
                        <div value="buscar" class="btn-primary btn_buscar" onclick="buscar_datos();" style="margin-left: 10px; ">Buscar</div>
                      </th>
                    </tr>

                    <tr>
                      <th style="padding: 0 7px 0 0">Nombre Completo:</th>
                      <th><input id="nombre_alumno" type="text" name="nombre" maxlength="100" style="width:500px; height:25px; margin: 7px 0" required><br></th>
                    </tr>

                    <tr>
                      <th>Actividad:</th>
                      <th>
                        <select name="actividad" id="select" style="width:500px;   height:25px;  margin:6px 0" required>

                        </select>
                      </th>

                    </tr>
                  </table> -->

                  <!-- INPUTS SIN ESTAR EN UNA TABLA -->
                  <div class="container_todos_los_inputs">
                    <div class="container_input">
                      <label for="matricula" class="label_input">Matricula:</label>
                      <input type="text" name="matricula" id="matricula_buscar" maxlength="50" class="input_1">
                      <div value="buscar" class="btn-primary btn_buscar" onclick="buscar_datos();">Buscar</div>
                    </div>

                    <div class="container_input">
                      <label for="nombre" class="label_input">Nombre:</label>
                      <input id="nombre_alumno" type="text" name="nombre" maxlength="100" class="input_2" required>
                    </div>

                    <div class="container_input">
                      <label for="actividad" class="label_input">Actividad:</label>
                      <select name="actividad" id="select" class="input_2" required>

                      </select>
                    </div>
                  </div>

                  <!-- div donde van los pfs, para poder visualizarlos -->
                  <div style="width:100%; margin-top: 10px; display: flex; align-items: start; flex-direction: row; flex-wrap: wrap;" id="contenedor_pdfs">

                  </div>


                  <!-- tabla de desempeño -->
                  <table class="table table-bordered table-hover table-condensed table_datos_desempeño" required>
                    <thead>
                      <tr>

                        <th>Criterios</th>
                        <th>Insuficiente</th>
                        <th>Suficiente</th>
                        <th>Bueno</th>
                        <th>Notable</th>
                        <th>Excelente</th>
                      </tr>
                    </thead>
                    <tr>
                      <td>Cumple en tiempo y forma con las actividades encomendadas alcanzando los objetivos:</td>
                      <td><label class="radio-inline"> <input type="radio" name="tiempo" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="tiempo" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="tiempo" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="tiempo" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="tiempo" value="4" required> 4 </label></td>
                    </tr>
                    <tr>
                      <td>Trabaja en equipo y se adapta a nuevas situaciones:</td>
                      <td><label class="radio-inline"> <input type="radio" name="equipo" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="equipo" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="equipo" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="equipo" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="equipo" value="4" required> 4 </label></td>
                    </tr>

                    <tr>
                      <td>Muestra liderazgo en las actividades encomendadas:</td>
                      <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="4" required> 4 </label></td>
                    </tr>

                    <tr>
                      <td>Organiza su tiempo y trabaja de manera proactiva:</td>
                      <td><label class="radio-inline"> <input type="radio" name="organiza" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="organiza" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="organiza" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="organiza" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="organiza" value="4" required> 4 </label></td>
                    </tr>

                    <tr>
                      <td>Interpreta la realidad y sensibiliza aportando soluciones a la problematica con la actividad complementaria:</td>
                      <td><label class="radio-inline"> <input type="radio" name="realidad" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="realidad" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="realidad" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="realidad" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="realidad" value="4" required> 4 </label></td>
                    </tr>

                    <tr>
                      <td>Realiza sugerencias innovadoras para beneficio o mejora del programa en el que participa:</td>
                      <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="4" required> 4 </label></td>
                    </tr>

                    <tr>
                      <td>Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio:</td>
                      <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="0" required> 0 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="1" required> 1 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="2" required> 2 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="3" required> 3 </label></td>
                      <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="4" required> 4 </label></td>
                    </tr>
                  </table>

                  <!-- parte donde va las observaciones y el boton para guardar los datos -->
                  <!-- <table>
                    <tr>
                    <tr>
                      <th>observaciones:</th>
                      <th><input type="text" name="obs" maxlength="50" style="width:500px; height:20x;"><br></th>
                    </tr>
                    </tr>

                    <tr>
                      <th><button name="enviar" value="enviar" class="btn btn-success"> Guardar</button><br></th>
                    </tr>
                    </tr>
                  </table> -->

                  <div class="container_obervacionesGuardar">
                    <label for="obs" class="label_obs">Obervaciones</label>
                    <textarea class="obs" name="obs"></textarea>
                    <div class="btn_guardar">
                      <button name="enviar" value="enviar" class="btn btn-success"> Guardar</button>
                    </div>
                  </div>
              </form>

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
} ?>

<!-- trallendo datos del alumno para ponerlos en los inputs -->
<script>
  function buscar_datos() {
    matricula_buscar = $("#matricula_buscar").val();
    //se manda la matricula al archivo php para buscar los datos enbase a esa matricula
    var parametros = {
      "buscar": "1",
      "matricula_buscar": matricula_buscar
    }; //fucnion que me manda esa matricula 
    $.ajax({
      data: parametros,
      dataType: 'json',
      url: 'datos_alumno_evaluacion_admi.php',
      type: 'post',
      error: function() {
        alert("Error");
      },
      //funcion que recibe los datos que el archivo "datos_alumno_evaluación.php" devuelve, esto los devuelve como un objeto llamado "valores"
      success: function(valores) {
        //nombre del alumno recibido, con esto agrego el nombre al input correspondiente
        $("#nombre_alumno").val(valores.nombre + " " + valores.ap_paterno + " " + valores.ap_materno);


        const actividad = valores.actividades;
        console.log(valores.actividades);
        console.log(valores.ruta);

        const select = document.getElementById("select");
        //aqui se recorreo el array donde se encuentran las actividades del alumno y se crea un option por actividad en el select correspondiente
        actividad.forEach(element => {
          let option = document.createElement('option');
          option.innerHTML = element;
          option.value = element;
          select.appendChild(option);
          console.log(element);
        });

        const pdf_container = document.getElementById("contenedor_pdfs");

        valores.ruta.forEach(element => {
          //cracion del elemento div, el cual contiene la imagen y ek nombre de la actividad
          let div = document.createElement('div');
          div.style = "height:30px; margin-right:30px";
          //creacion de la imagen
          let img = document.createElement('img');
          //se le coloca a la imagen el atributo src para que captura que imagen se pindrá
          img.src = "../images/pdf_logo.png";
          //se le da estilos a esa imagen
          img.style = "width:20px; heigth:20px; margin-right:7px";
          //se crea el elemento "a", que me permite abrir el pdf 
          let a = document.createElement("a");
          //se le agregan atributos al "a"
          a.innerHTML = element;
          a.href = "#";
          a.style = "text-decoration: none; color: #636e72;";
          //funcion que me permite abrir un archivo en ventana
          a.addEventListener('click', function() {
            window.open(`./cargas/${element}`, "_blank");
          })
          //se mete el elemeto img dentro del div
          div.appendChild(img);
          //se mete el elemento "a" en el div
          div.appendChild(a);
          //se mete el elemento div dentro de otro div que contendrá todos los divs que se creen
          pdf_container.appendChild(div);

        });


      }


    })


  };
</script>
