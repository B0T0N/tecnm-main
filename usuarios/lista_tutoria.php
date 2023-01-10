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
?>



<!DOCTYPE html>
<html>
<head>



  <?php include ('../layout/head.php'); ?>
  <title>Listado de tutorias</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php 
  $sql= "SELECT * FROM tb_tutorias";
  $resultado = mysqli_query($conexion,$sql);
  ?>
<?php include ('../layout/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modulo de Tutorias
      
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content"> 

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Agregar tutoriado
</button>

<!-- Modal -->     
 <form action="tutoria_create.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo tutoriado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <div class="form-group">
  <label for="id_alumno" class="col-sm2 control-label">Numero de control</label>
  <div class="">
    <input type="text" name="id_alumno" id="id_alumno" class="form-control" >
  </div>
     
      <div class="form-group">
        <label for="nombre" class="col-sm2 control-label">Nombre</label>
        <div class="">
          <input type="text" name="nombre" id="nombre" class="form-control" 
         >
        </div>
        
        
        <div class="form-group">
  <label for="apellidopaterno" class="col-sm2 control-label">Apellido paterno</label>
  <div class="">
    <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control" >
  </div>


      <div class="form-group">
        <label for="apellidomaterno" class="col-sm2 control-label">Apellido materno</label>
<div class="">
  <input type="text" name="apellidomaterno" class="form-control" >
</div>




  <div class="form-group" class="col-sm2 control-label">
      <label for="semestre">Seleccionar semestre</label>
      <select name="semestre" id="" class="form-control">
      <option value="elegir">Elegir una Opcion</option>
      <option value="Primer semestre">Primer semestre</option>
      <option value="Segundo semestre">Segundo semestre</option>
      <option value="Tercer semestre">Tercer semestre</option>
      <option value="Cuarto semestre">Cuarto semestre</option>
      <option value="Quinto semestre">Quinto semestre</option>
      <option value="Sexto semestre">Sexto semestre</option>
      </select>
      </div>


      <div class="form-group" class="col-sm2 control-label">
      <label for="carrera">Seleccionar carrera</label>
      <select name="carrera" id="" class="form-control">
      <option value="elegir">Elegir una Opcion</option>
      <option value="Ingeneria en Agronomia">Ingeneria en Agronomia</option>
      <option value="Ingeneria Forestal">Ingeneria Forestal</option>
      <option value="Infeneria en Industrias Alimentarias">Infeneria en Industrias Alimentarias</option>
      <option value="Licenciatura en Biologia">Licenciatura en Biologia</option>
      <option value="Ingeneria Informatica">Ingeneria Informatica</option>
      <option value="Ingeneria en Administracion">Ingeneria en Administracion </option>
      <option value="Infeneria en Gestion Empresarial">Infeneria en Gestion Empresarial</option>
  </select>
      </div>


      <div class="form-group" class="col-sm2 control-label">
      <label for="estado"> Estado del Alumno</label>
      <select name="estado" id="" class="form-control">
      <option value="elegir">Elegir una Opcion</option>
      <option value="Acreditado">Acreditado</option>
      <option value="NO Acreditado">NO Acreditado</option>
      </select>
      </div>


</div>

</div>


      </div>
      </div>
      </div>

      <!--vista-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" value="Registrar">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

    <!---->
     
    <div class="panel panel-primary">
   
        
  <div class="panel-heading">Listado de tutorias</div>
  <div class="panel-body">
  <table class="table table-bordered table-hover table-condensed">
  <th>Nro</th>
  <th>Nombre</th>
  <th>Apellido paterno</th>
  <th>Apellido materno</th>
  <th>Numero control</th>
 <th>Carrera</th>
  <th>Estado</th>
  <th>Semestre</th>
  <th>Acciones</th>
                            
                            
    
  <?php
      while($filas = mysqli_fetch_assoc($resultado)){
?>
      
      <tr>
        <td><?php echo $filas['id']?></td>
        <td><?php echo $filas['nombres']?></td>
        <td><?php echo $filas['ap_paterno']?></td>
        <td><?php echo $filas['ap_materno']?></td>
        <td><?php echo $filas['id']?></td>
        <td><?php echo $filas['carrera']?></td>
        <td><?php echo $filas['estado']?></td>
        <td><?php echo $filas['semestre']?></td>
        
        <td>
          <?php  echo "<a href='eliminar.php?id=".$filas['id']."'>ELIMINAR</a>";?>
          <?php  echo "<a href='historial_incidencia_alumno.php?id=".$filas['id']."' >ver</a>";?>
          
          
          
        </td>
      </tr>
      <?php
    }
    ?>
 
</table>
</div>
</div>
</section>
</div>


  <!-- /.content-wrapper -->
  <?php include ('../layout/footer.php'); ?>
  <?php include ('../layout/footer_links.php'); ?>


</body>
</html>





<?php
}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}