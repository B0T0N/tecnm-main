<?php 


include ('../app/config/config.php');






$buscardor = mysqli_query ($conexion,"SELECT tb_usuarios.id, tb_usuarios.nombres,tb_usuarios.ap_paterno,tb_usuarios.ap_materno,tb_usuarios.carrera,tb_usuarios.numero_control,tb_usuarios.telefono,grupos.habilidad,grupos.desempeyo,grupos.calificacion,grupos.idActividad FROM grupos INNER JOIN tb_usuarios ON grupos.matricula = tb_usuarios.numero_control WHERE matricula LIKE LOWER('%".$_POST["buscar"]."%') "); 
$numero = mysqli_num_rows($buscardor); 
?>



<?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>


<div class="container">

<div class="row">
    <div class="col">
    <label class="control-label">Matricula</label>
   <?php echo $resultado["id"]; ?>
    </div>

    <!--<div class="col">
    <label class="control-label">Nombre</label>
        //7<?php echo $resultado["nombres"] ?>
    </div>-->

 

    
</div>
    <div class="row">
        <div class="col">
        <label class="control-label">Nombre</label>
              <?php echo $resultado["nombres"] ?>
        </div>

        

        <div class="col">
        <label class="control-label">Apellido paterno</label>
        <?php echo $resultado["ap_paterno"] ?> 
        </div>

        <div class="col">
        <label class="control-label">Apellido materno</label>
        <?php echo $resultado["ap_materno"] ?>  
        </div>
    </div>
    <br><br><br><br>

    <?php 
  
  $buscardor = mysqli_query ($conexion,"SELECT * FROM grupos WHERE matricula LIKE LOWER('%".$_POST["buscar"]."%') "); 
  //$numero = mysqli_num_rows($buscardor);
  ?>





    <div class="row">

    <div class="col">
            <h3>Total de horas <?php echo $numero?>
                
            </h3>
        </div>

        <div class="col">
       
               <a href="constanciaActividades.php"><button class="btn btn-primary" > Generar constancia</button></a>
       
        </div>

        
    </div>
           
     </div>


     <div class="container">
   
    <?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>

   
</div>
<?php } } ?> 