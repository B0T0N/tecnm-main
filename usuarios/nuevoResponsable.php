<?php
include ('../app/config/config.php');
session_start();

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


    $sql = ("SELECT id FROM ciclo ORDER BY id DESC LIMIT 1;");
    $query = $bdd->prepare( $sql );
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_OBJ);

    $idCiclo = $resultado->id;

    $sql = ("SELECT id, nombreCategoria FROM categorias WHERE idCiclo = $idCiclo;");
    $query = $bdd->prepare( $sql );
    $query->execute();
    $categorias = $query->fetchAll(PDO::FETCH_OBJ);

?>



<!DOCTYPE html>
<html>
<head>
  <?php include ('../layout/head.php'); ?>
  <title>Asignacion de responsables</title>
  <link rel="stylesheet" href="../css/StyleNew.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ('../layout/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ASIGNACIÓN DE RESPONSABLES
        <small>Listado de campos extraescolares</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Listado</div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12">

                                <div class="row">

                                  <form action="" method="GET">
                                    <div class="col-md-6">

                                      <label for="caja_busqueda">BUSCAR</label>
                                      <input class="form-control" type="search" name="caja_busqueda" id="caja_busqueda" maxlength="50">
                                    
                                    </div>

                                    <br>

                                    <br>

                                          
                                    </div>

                                    <div class="col-md-6">

                                    </div>
                                  </form>

                                </div>

                              </div>

                              <div class="col-md-12">

                              <div class="" id="datos">

                              </div>

                              </div>
                            </div>
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


    <script src="js/jquery.min.js"></script>

</body>
</html>
<script>
  $(dame_datos());

function dame_datos(consulta) {
    $.ajax({
        url: 'buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function () {
        console.log("FAllIDO");
    })

}


$(document).on('keyup', '#caja_busqueda', function() {
    var valor = $(this).val();
    if(valor != ""){
        dame_datos(valor);
    } else {
        dame_datos();
    }
});


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
<?php
}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}
