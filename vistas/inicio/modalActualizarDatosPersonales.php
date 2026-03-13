<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">
<!-- Modal -->
<div class="modal fade" id="actualizarDatosPersonales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos Personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="paternoInicio">Paterno</label>
        <input type="text" class="form-control" id="paternoInicio" name="paternoInicio">
        <label for="maternoInicio">Materno</label>
        <input type="text" class="form-control" id="maternoInicio" name="maternoInicio">
        <label for="nombreInicio">Nombre</label>
        <input type="text" class="form-control" id="nombreInicio" name="nombreInicio">
        <label for="telefonoInicio">Teléfono</label>
        <input type="text" class="form-control" id="telefonoInicio" name="telefonoInicio">
        <label for="correoInicio">Correo</label>
        <input type="mail" class="form-control" id="correoInicio" name="correoInicio">
        <label for="fechaNacInicio">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fechaNacInicio" name="fechaNacInicio">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>