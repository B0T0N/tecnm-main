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
  <title>Incidencias</title>
</head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <?php 
  $sql= "SELECT * FROM tb_incidencia WHERE Estado = '1'";
  
  $resultado = mysqli_query($conexion,$sql);

  $numero = mysqli_num_rows($resultado); 

  ?>
  <?php include ('../layout/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Incidencias
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content"> 


  <a href="incidencias.php">  <button type="button" class="btn btn-success">Incidencia iniciada: <?php echo $numero ?></button></a>
  <a href="historial_detenido.php">  <button type="button" class="btn btn-danger">Incidencia detenido: <?php echo $numero ?></button></a>
                  <!-- Modal -->

  <!-- Listado de incidencias -->
     
    <div class="panel panel-primary">
   
        
  <div class="panel-heading">Listado de incidencia</div>
  <div class="panel-body">
  <table class="table table-bordered table-hover table-condensed">
 
  <th>Motivo</th>
  <th>Categoria</th>
  <th>Prioridad</th>
  <th>Matricula</th>
  <th>Estado de inicidencia</th>
  <th>Fecha y hora de incidencia</th>
  <th>Acciones</th>
  

                            
<?php
      while($filas = mysqli_fetch_assoc($resultado)){
?>
      
      <tr>
       
        <td><?php echo $filas['motivo']?></td>
        <td><?php echo $filas['categoria']?></td>

        <td class="px-2 py-1 align-middle text-center">
    <?php
    switch ($filas['prioridad']) {
   case '0':
   echo '<span class="rounded-pill badge badgedefault bg-maroon px-3">Urgente</span>';
    break;
   case '1':
echo '<span class="rounded-pill badge badge-warning bg-yellow px-3">Medio</span>';
 break;
   case '2':
 echo '<span class="rounded-pill badge badge-info bg-aqua px-3">Bajo</span>';
  break;
  }
?>
</td>
        <td> <span id="id<?php echo $filas['id'];?>"><?php echo $filas['id_alumno']?></span></td>

        <td class="px-2 py-1 align-middle text-center">
    <?php
    switch ($filas['Estado']) {
   case '0':
   echo '<span class="rounded-pill badge badgedefault bg-green px-3">Iniciada</span>';
    break;
   case '1':
echo '<span class="rounded-pill badge badge-warning bg-yellow px-3">En proceso</span>';
 break;
   case '2':
 echo '<span class="rounded-pill badge badge-info bg-maroon px-3">Stop</span>';
  break;

  case '3':
    echo '<span class="rounded-pill badge badge-info bg-primary px-3">Finalizado</span>';
     break;
  }
?>
</td>
        <td><?php echo $filas['timestamp']?></td>

       
     

<td><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#example<?php echo $filas['id_incidencia']; ?>">
          Actualizar estado de incidencias
      </button></td>
     
    

      

 <div class="modal fade" id="example<?php echo $filas['id_incidencia']; ?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="example">Actualizar estado de incidencia</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>


<form method="post" action="actualizar_incidencia.php">
  <input type="hidden" name="id" value="<?php echo $filas['id_incidencia']; ?>">

 <div class="modal-body" id="">
<div class="form-group">
  <label>Id incidencia: </label>
 <?php echo $filas['id_incidencia']; ?>
</div>


<div class="form-group">
  <label>Matricula Alumno:</label>
<?php echo $filas['id_alumno']; ?>
</div>


<div class="form-group" class="col-sm2 control-label">
  <label for="status">Seleccionar Status de incidencia</label>
    <select name="status" id="" class="form-control" value="<?php echo $filas['id_incidencia']; ?>">
      <option value="">Elegir una Opcion</option>
<option value="3" <?= (isset($incidencia) && $incidencia == 3) ? 'selected' : '' ?>>Finalizada</option>
 <option value="1" <?= (isset($incidencia) && $incidencia == 1) ? 'selected' : '' ?>>En proceso</option>
 <option value="2" <?= (isset($incidencia) && $incidencia== 2) ? 'selected' : '' ?>>Stop</option>

  </select>

  <div class="form-group">
  <label for="motivoacc" class="col-sm2 control-label">Motivo actualizacion</label>
  <div class="">
   <input type="text" name="motivoacc" id="" class="form-control" placeholder="Motivo de incidencia">
  </div>

  </div>






  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" value="Actualizar">Guardar</button>
  </div>

    

  </div>
</form>

 
     
  


</div>



         
</div>
</div>
</div>
</div>

<div>


        
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
