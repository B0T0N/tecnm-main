<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $sqli = "SELECT * FROM `tutores`;";

            $res = mysqli_query($conexion, $sqli);
        
            ?>
</head>
<body>
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $filas['id']; ?>">
                                                Asignar tutor
                                            </button></td>





                                        <div class="modal fade" id="example<?php echo $filas['id']; ?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="example">Asignar tutor</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>

                                                    </div>


                                                    <form method="post" action="actualizar_tutor.php">
                                                        <input type="hidden" name="id" value="<?php echo $filas['id']; ?>">
                                                        <div class="modal-body">
                                                        <div class="col">
                        <div class="form-group" class="col-sm2 control-label">
                          <label for="prioridad">Seleccionar tutor</label>
                          <select name="tutor" id="" class="form-control" required>
                            <option value="">Seleccionar una opcion</option>
                           <?php
                                                    while ($filos = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                    
                                                        <option value="<?php echo $filos['id']?>"> <?php echo $filos['nombre']?></option>
                                                    <?php
                                                    }
                                                    ?>
                          </select>
                        </div>
                      </div>
                      
                                       

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary" value="Actualizar">Guardar</button>
                                                        </div>




                                                    </form>

                                    
                                                    </td>


                                                </div>




                                            </div>
                                        </div>
                        </div>
                    </div>

                    <div>

</body>
</html>