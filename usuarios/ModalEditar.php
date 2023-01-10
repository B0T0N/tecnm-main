
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4859dd !important; padding: 5px;">
        <h2 class="modal-title" style="color: #fff; text-align: center;">
            Acreditacion del alumno
        </h2>
      </div>


      <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['id']; ?>">
        <input type="hidden" name="control" value="<?php echo $dataCliente['numero_control']; ?>">
        <input type="hidden" name="actividad" value="<?php echo $dataCliente['idActividad']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label" style="margin-right: 60%;">Criterios</label>

                  <label for="recipient-name" class="col-form-label" style="margin: 0.5%;">Insuficiente</label>
                  <label for="recipient-name" class="col-form-label" style="margin: 0.5%;">Suficiente</label>
                  <label for="recipient-name" class="col-form-label" style="margin: 0.5%;">Bueno</label>
                  <label for="recipient-name" class="col-form-label" style="margin: 0.5%;">Notable</label>
                  <label for="recipient-name" class="col-form-label" style="margin: 0.5%;">Excelente</label>
                  <br><br>
                  <p style="display: inline; margin-right: 23.5%;">Cumple en tiempo y forma con las actividades encomendadas alcanzando los objetivos:</p>

                  <input type="radio" name="tiempo" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="tiempo" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="tiempo" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="tiempo" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="tiempo" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 41.7%;">Trabaja en equipo y se adapta a nuevas situaciones:</p>

                  <input type="radio" name="equipo" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="equipo" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="equipo" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="equipo" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="equipo" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 41.3%;">Muestra liderazgo en las actividades encomendadas:</p>

                  <input type="radio" name="liderazgo" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="liderazgo" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="liderazgo" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="liderazgo" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="liderazgo" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 42.4%;">Organiza su tiempo y trabaja de manera proactiva:</p>
                  
                  <input type="radio" name="organiza" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="organiza" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="organiza" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="organiza" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="organiza" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 13.3%;">Interpreta la realidad y sensibiliza aportando soluciones a la problematica con la actividad complementaria:</p>

                  <input type="radio" name="interpreta" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="interpreta" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="interpreta" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="interpreta" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="interpreta" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 22.2%;">Realiza sugerencias innovadoras para beneficio o mejora del programa en el que participa:</p>

                  <input type="radio" name="realiza" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="realiza" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="realiza" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="realiza" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="realiza" value="4" required>

                  <hr style="margin: 12px;">

                  <p style="display: inline; margin-right: 21.2%;">Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio:</p>

                  <input type="radio" name="iniciativa" value="0" style="margin-right: 5.8%;" required>
                  <input type="radio" name="iniciativa" value="1" style="margin-right: 4.3%;" required>
                  <input type="radio" name="iniciativa" value="2" style="margin-right: 3.7%;" required>
                  <input type="radio" name="iniciativa" value="3" style="margin-right: 4%;" required>
                  <input type="radio" name="iniciativa" value="4" required>

                  <hr>
                  
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label for="obs" class="label_obs">Obervaciones</label> <br>
                      <textarea name="habilidad" id="habilidad" cols="100" rows="3"></textarea>
                    </div>
                    <div class="col-md-4">
                      <label for="recipient-name" class="col-form-label">Calificacion:</label>
                      <select class="form-control" name="calificacion" id="calificacion" required>
                        <option value="">SELECCIONE</option>
                        <option value="1">Acreditado</option>
                        <option value="2">No Acreditado</option>
                      </select>
                    </div>
                  </div>
                  

                  
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
