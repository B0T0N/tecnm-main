<?php 


include ('../app/config/config.php');






$buscardor = mysqli_query ($conexion,"SELECT * FROM tb_tutorias WHERE id LIKE LOWER('%".$_POST["buscar"]."%') "); 
$numero = mysqli_num_rows($buscardor); 
?>



<?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>


<div class="container">

<div class="row">
    <div class="col">
    <label class="control-label">Matricula</label>
   <?php echo $resultado["id"]; ?>
    </div>

    <div class="col">
    <label class="control-label">Carrera</label>
        <?php echo $resultado["carrera"] ?>
    </div>

    <div class="col">
    <label class="control-label">Semestre</label>
        <?php echo $resultado["semestre"] ?> 
    </div>

    
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
  
  $buscardor = mysqli_query ($conexion,"SELECT * FROM constancia_tutoria WHERE numero_control LIKE LOWER('%".$_POST["buscar"]."%') "); 
  $numero = mysqli_num_rows($buscardor); 
  ?>





    <div class="row">

    <div class="col">
            <h3>Total de semestres aprobados: <?php echo $numero?>
                
            </h3>
        </div>

        <div class="col">
       <?php  
       if($numero == 6){
               echo '<a href="constancias_terminacion.php"><button class="btn btn-primary" > Generar constancia</button></a>';
       }else{
        echo '<button class="btn btn-primary" disabled > Generar constancia</button>';
       }
?>
        </div>

        
    </div>
           
     </div>


     <div class="container">
   
        
  <?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>

  

<div class="row">
    <div class="col">
    <label class="control-label">Semestre</label>
   <?php echo $resultado["semestre"]; ?> -  <?php echo $resultado["tipo"]; ?>
</div>
   
</div>
<?php } } ?> 

   