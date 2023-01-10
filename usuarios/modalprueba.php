<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $sq = "SELECT * FROM tb_ciclos 
       ";

            $result = mysqli_query($conexion, $sq);
        
            ?>
</head>
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Nuevo Grupo
                    </button>

                    <form action="grupoCreate.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Alta de grupo</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    <div class="row">

<div class="col">
<div class="form-group" class="col-sm2 control-label">
<label for="prioridad">Seleccionar prioridad</label>
<select name="carrera" id="" class="form-control" required>
<option value="">Selecciona una opcion</option>
                <option value="Ing informatica">Ing informatica</option>
                <option value="ing forestal">Ing forestal</option>
                <option value="ing administracion">Ing.Administracion</option>
            </select>
</select>
</div>
</div>
<div class="col">
<div class="form-group" class="col-sm2 control-label">
<label for="prioridad">Seleccionar prioridad</label>
<select name="periodo" id="" class="form-control" required>
<?php
        while ($filo = mysqli_fetch_assoc($result)) {
        ?>
        
            <option value="<?php echo $filo['ciclo_escolar']?>"> <?php echo $filo['ciclo_escolar']?></option>
        <?php
        }
        ?>
</select>
</div>

                                        </div>
                                        
                                     


                                         
                                        </div>


<div class="row">
    <div class="col">
    <div class="form-group">
                                                    <label for="id_alumno" class="col-sm2 control-label">Semestre</label>
                                                    <div class="">
                                                        <input type="text" name="semestre" id="" class="form-control" placeholder="Semestre escolar" required>
                                                    </div>
                                                </div>
    </div>
</div>


                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" value="Registrar">Guardar</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
</body>
</html>
