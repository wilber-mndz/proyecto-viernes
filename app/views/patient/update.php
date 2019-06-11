<?php require_once('../app/views/inc/header.php')?>

<div class="card">
    <div class="card-header">
        <h5 class="title">Actualizar Usuario</h5>
        <a class="text-info" href="<?php echo ROUTE_URL?>/users"><i class="fas fa-step-backward"></i> Regresar</a>
    </div>
    <div class="card-body">
      <div class="modal fade modal-user" id="new_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog " role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Nuevo usuario</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <!-- Formulario nuevo usuario -->
                  <form action="<?php echo ROUTE_URL?>/users/" method="post" id="form-usuario" id="form-usuario">
                      <div class="modal-body">

                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="first_name">Nombre</label>
                                      <input type="text" class="form-control" name="first_name" id="first_name"
                                          placeholder="Ingrese el nombre">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="last_name">Apellido</label>
                                      <input type="text" class="form-control" name="last_name" id="last_name"
                                          placeholder="Ingrese el apellido">
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="birthdate">Fecha de nacimiento</label>
                                      <input type="text" class="form-control" name="birthdate" id="birthdate"
                                          placeholder="YYYY-MM-DD">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <label for="">Sexo</label>
                                  <div class="form-group form-inline">
                                      <label class="form-check-label" style="margin-right: 20px">
                                          <input class="form-check-input" type="radio" name="gender" id="gender" value="1">
                                          Hombre
                                          <span class="form-check-sign"></span>
                                      </label>
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="gender" id="gender" value="2">
                                          Mujer
                                          <span class="form-check-sign"></span>
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="user_type">Tipo de usuario</label>
                                      <select class="form-control" name="user_type" id="user_type">
                                          <option value="1">Estándar</option>
                                          <option value="2">Administrador</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="email">Correo</label>
                                      <input type="email" class="form-control" name="email" id="email"
                                          placeholder="Ingrese un correo">
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="password">Contraseña</label>
                                      <input type="password" class="form-control" name="password" id="password"
                                          placeholder="Ingrese la contraseña">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="password2">Contraseña</label>
                                      <input type="password" class="form-control" name="password2" id="password2"
                                          placeholder="Repetir contraseña">
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger errors" style="display:none" id="errores"></div>
                              </div>
                          </div>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <input type="submit" class="btn btn-info" name="guardar" value="Guardar">
                      </div>
                  </form>
                  <!-- Formulario nuevo usuario -->
              </div>
          </div>
      </div>

    </div>
    <!-- Formulario nuevo usuario -->
</div>
<?php require_once('../app/views/inc/footer.php');
// Alertas
// if ($parameters['alert'] == 'saved') {
//     echo
//     "<script>
//         Swal.fire({
//         title: 'Datos guardados',
//         text: 'Nuevo paciente registrado exitosamente',
//         type: 'success',
//         confirmButtonText: 'Aceptar'
//       })
//     </script>";
// }
?>
