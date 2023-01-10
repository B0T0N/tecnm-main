<?php
include ('../app/config/config.php');
session_start();

if(isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0 ){
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

    $idCiclo = $resultado === false ? 1 : $resultado->id;

    $sql = ("SELECT id, descripcion FROM ciclo ORDER BY id DESC LIMIT 1;");
    $query = $bdd->prepare( $sql );
    $query->execute();
    $ciclos = $query->fetch(PDO::FETCH_OBJ);

    $sql = "SELECT categorias.id, categorias.nombreCategoria, categorias.prioridad, imagen.imagen FROM categorias INNER JOIN imagen ON categorias.idImagen = imagen.id WHERE idCiclo = $idCiclo;";
    $req = $bdd->prepare($sql);
    $req->execute();
    $campos = $req->fetchAll();

?>



<!DOCTYPE html>
<html>
<head>
  <?php include ('../layout/head.php'); ?>
  <title>Listado de Alumnos Activos</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ('../layout/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php
                if (isset($ciclos->descripcion) == "") {
                    echo "No Existen Ciclos";
                } else if (isset($ciclos->descripcion) == $ciclos->descripcion) {
                    echo "CICLO ".$ciclos->descripcion;
                }
            ?>
            <small>Listado de categoria</small>
        </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Categorías disciplinarias
                        </div>
                        <div class="panel-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-light">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Categoría</th>
                                                <th>Logotipo</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                    
                                            <tbody>
                                                <?php foreach($campos as $campo){?>
                                                <tr>
                                                    <td>
                                                        <h3><?php echo $campo['nombreCategoria'] ?></h3>
                                                    </td>

                                                    <td>
                                                        <img src="data:image/jpg;base64,<?php echo base64_encode($campo['imagen']);?>" width = "150px" alt="...">
                                                    </td>
                                        
                                                    <td>
                                                    <a class="btn btn-primary btn-lg" href="<?php echo "actividadesCampo.php?id=".$campo ['id'] ?>" >entrar</a> 
                                                    </td>
                                            
                                            
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                    
                                        </table>
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
