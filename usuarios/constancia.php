<?php
include('../app/config/config.php');
session_start();
if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0) {
  //echo "existe sesión";) {
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
    <title>Constancias</title>
    <link rel="stylesheet" href="css/estilo_parrafo.css">
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
            CONSTANCIA DE CRÉDITOS COMPLEMENTARIOS
            <small>Capturar los datos</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Captura de Datos Para la Constancia</div>
            <div class="panel-body">
              <!-- <table class="table table-bordered table-hover table-condensed">

                <body>
                  <div class="container">
                    <br>
                    <div class="row">
                      <form action="cntrlconstancia.php" method="POST">
                    </div>


              </table> -->
              <h2> CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA.</h2>
              <br>
              <!-- Opcion para ver cuantos creditos lleva el alumno (esta informacion es el resultado de la evalucion que realiza el maestro) -->
              <div class="container_input">
                <label for="matricula" class="label_input">Matricula:</label>
                <input type="text" name="matricula2" id="buscar_matricula" maxlength="50" class="input_1">
                <div value="buscar" class="btn-primary btn_buscar" onclick="datos_constancia();">Buscar</div>
              </div>
              <!-- tabla con los datos solicitados en el input anterior (matricula) -->
              <table class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr class="info">
                    <th>Nombre Alumno</th>
                    <th>Observaciones</th>
                    <th>Desempeño</th>
                    <th>Valor</th>
                    <th>Evento o Actividad</th>
                    <th>Credito</th>
                  </tr>
                </thead>
                <tbody id="body_table">
                </tbody>
              </table>

              <div class="docs" id="docs">
                <p id="credito_valor">Créditos totales: </p>

              </div>

              <!-- formulario para guardar la constancia -->
              <form action="cntrlconstancia.php" method="POST">

                <p style="margin-top:20px">
                  <input type="text" name="jefe" maxlength="100" class="input_border input_largo" placeholder="Jefe(a)" required>
                  <br>

                  Jefe(a) del Departamento de Servicios Escolares o su equivalente en los Institutos Tecnológicos Descentralizados

                  <br>
                  PRESENTE.
                </p>
                <br>
                <br>
                <br>
                <p class="parrafo_inputs">
                  El que se suscribe <input type="text" name="suscribe" maxlength="100" class="input_border input_largo" placeholder="Suscribe" required>, por
                  este medio se permite hacer de su conocimiento que
                  <br> el estudiante <input type="text" name="alumno" maxlength="100" required class="input_border input_largo" placeholder="Nombre alumno" id="nombre">
                  con número de control <input type="text" name="matricula" required maxlength="100" class="input_border input_corto" placeholder="Matricula alumno" id="matricula"><br>
                  de la carrera de <input type="text" name="carrera" maxlength="100" required class="input_border input_largo" placeholder="Carrera del alumno" id="carrera">
                  ha cumplido su actividad complementaria con el nivel de desempeño<br> <select required name="desempe" id="desem" class="input_border" style="color:black">
                    <option value="" selected disabled>Desempeño</option>
                    <option value="INSUFICIENTE">INSUFICIENTE</option>
                    <option value="SUFICIENTE">SUFICIENTE</option>
                    <option value="BUENO">BUENO</option>
                    <option value="NOTABLE">NOTABLE</option>
                    <option value="EXCELENTE">EXCELENTE</option>
                  </select>
                  y un valor numérico de <input type="text" name="valor" maxlength="100" required class="input_border input_corto" placeholder="Valor">,
                  durante el periodo escolar <input type="text" name="ciclo" maxlength="100" required class="input_border input_corto" placeholder="Ciclo escolar">
                  con un valor curricular de <input type="number" name="valorcurri" maxlength="100" required class="input_border input_corto" id="credi">
                  créditos.
                </p>
                <br>
                Se extiende la presente en el poblado de Chiná en la fecha
                <?php
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $fecha = setlocale(LC_ALL, "es_ES");
                $dias = date("d");
                $mes =  $meses[date('n') - 1];
                $anio = date("Y");
                $fecha = $dias . "-" . $mes . "-" . $anio;

                echo   $dias . " dias de  " . $mes . " de " . $anio; ?>


                <input type="text" name="fecha" value="<?php echo $fecha ?>" style="display: none;">
                <center>
                  <td colspan="6"><input type="submit" class="btn btn-success mt-5 btn-lg" value="Guardar" id="btnGuardar"></td>
                </center>
              </form>
              <div id="content" class="col-lg-12">

              </div>


            </div>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          <?php include('../layout/footer.php'); ?>
          <?php include('../layout/footer_links.php'); ?>
      </div>

  </body>

  </html>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
?>

<script>
  function datos_constancia() {
    var trs = document.querySelectorAll('#body_table tr');
    if (trs.length) {
      if (confirm("Ya consultaste datos ¿Quieres borrarlos para volver a consultar?")) {
        location.reload();
      }
    } else {
      buscar_matricula = $("#buscar_matricula").val();
      //se manda la matricula al archivo php para buscar los datos enbase a esa matricula
      var parametros = {
        "buscar": "1",
        "buscar_matricula": buscar_matricula
      }; //fucnion que me manda esa matricula 
      $.ajax({
        data: parametros,
        dataType: 'json',
        url: 'constancia_datos.php',
        type: 'post',
        error: function() {
          alert("Error");
        },
        //funcion que recibe los datos que el archivo "datos_alumno_evaluación.php" devuelve, esto los devuelve como un objeto llamado "valores"
        success: function(datos) {

          //INPUTS DEL ALUMNO PARA LLENAR LA CONSTANCIA--------------
          const nombre = document.getElementById('nombre');
          const matricula = document.getElementById('matricula');
          const correo = document.getElementById('correo');
          const carrera = document.getElementById('carrera');
          //const desem = document.getElementById('desem');
          const creditos = document.getElementById('credi');

          //----------------------------------------------------


          let btn = document.getElementById('btnGuardar');
          //creditos
          const valor = document.getElementById("credito_valor");
          let valorFinal = 0;


          //console.log(datos);
          const docs = document.getElementById("docs");
          const body_tabla = document.getElementById("body_table");
          console.log(datos);

          for (let i = 1; i < datos.length; i++) {
            //se crean los elementos tr y td de la tabla
            let tr = document.createElement('tr');
            let td1 = document.createElement('td');

            //se agregan los valores correspondientes en la posicion correspondiente de la tabla
            td1.innerHTML = datos[i]['nombre'];
            console.log(datos[i]['nombre']);
            let td2 = document.createElement('td');
            td2.innerHTML = datos[i]['observacion'];
            let td3 = document.createElement('td');
            td3.innerHTML = datos[i]['desmp'];
            let td4 = document.createElement('td');
            td4.innerHTML = datos[i]['valor'];
            //PDFS---------------
            let div = document.createElement('div');
            div.style = "height:30px; margin-right:30px";
            let img = document.createElement('img');
            img.src = "../images/pdf_logo.png";
            img.style = "width:20px; heigth:20px; margin-right:7px";
            let a = document.createElement('a');
            a.href = `./cargas/${datos[i][4]}`;
            a.innerHTML = datos[i][6];
            a.target = "_blank";
            a.style = "margin-right:10px";
            div.appendChild(img);
            //se mete el elemento "a" en el div
            div.appendChild(a);
            //-----------------
            let td5 = document.createElement('td');
            td5.innerHTML = datos[i]['title'];
            let td6 = document.createElement('td');
            td6.innerHTML = datos[i]['credito'];
            a.appendChild(td5);
            //se meten todos los td en el elemento tr
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            //se agrega el elemento tr en la tabla
            body_tabla.appendChild(tr);
            //se agrega el div con los pdfs en donde va
            docs.appendChild(div);

          }

          //obtener el credito, el cual se encuentra en la posicion 5 del arreglo "datos", despues sumo todos los creditos y los guardo en una variable para mostrarlos en pantalla --------------------------

          for (let e = 1; e < datos.length; e++) {
            //variable que convierte los creditos a numeros
            let numero = Number(datos[e][5]);
            //se hace la suma de los creditos
            valorFinal = valorFinal + numero;

          }
          //se crea un elemento b
          let b = document.createElement('b');
          //se le agrega al elemento creado la suma de los creditos
          b.innerHTML = valorFinal;
          valor.appendChild(b);
          //console.log(b);
          // si el valor final es menor a 2 se desabilita el boton de enviar
          if (valorFinal < 2) {
            btn.disabled = true;
          }
          //INPUTS DEL ALUMNO PARA LLENAR LA CONSTANCIA--------------
          //creditos
          creditos.value = valorFinal;
          creditos.setAttribute("readonly", "");
          creditos.style.backgroundColor = "antiquewhite";
          creditos.style.color = "black";

          //nombre
          nombre.value = datos[0]['nombres'] + " " + datos[0]['ap_paterno'] + " " +
            datos[0]['ap_materno'];
          nombre.setAttribute("readonly", "");
          nombre.style.backgroundColor = "antiquewhite";
          nombre.style.color = "black";

          //matricula
          matricula.value = datos[0]['numero_control'];
          matricula.setAttribute("readonly", "");
          matricula.style.backgroundColor = "antiquewhite";
          matricula.style.color = "black";

          //carrera
          carrera.value = datos[0]['carrera'];
          carrera.setAttribute("readonly", "");
          carrera.style.backgroundColor = "antiquewhite";
          carrera.style.color = "black";

          //correo
          correo.value = datos[0]['correo'];
          correo.setAttribute("readonly", "");
          correo.style.backgroundColor = "antiquewhite";
          correo.style.color = "black";



          //---------------------------------------------------
        }



      })
    }



  };
</script>