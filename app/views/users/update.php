<?php require_once('../app/views/inc/header.php')?>

<div class="card" >
    <div class="card-header">
        <h5 class="title">Actualizar Usuario</h5>
    </div>
    <div class="card-body">
      <!-- Formulario nuevo usuario -->
      <form action="<?php echo ROUTE_URL?>/users/update/<?php echo $parameters['user']->id_user ?>" method="post" id="form-usuario">
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="first_name">Nombre</label>
                          <input type="text" class="form-control" name="first_name" id="first_name"
                              placeholder="Ingrese el nombre" value="<?php echo $parameters['user']->name ?>">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="last_name">Apellido</label>
                          <input type="text" class="form-control" name="last_name" id="last_name"
                              placeholder="Ingrese el apellido" value="<?php echo $parameters['user']->last_name ?>">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="birthdate">Fecha de nacimiento</label>
                          <input type="text" class="form-control" name="birthdate" id="birthdate"
                              placeholder="Ingrese fecha de nacimiento" value="<?php echo $parameters['user']->birthdate ?>">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label for="">Sexo</label>
                      <div class="form-group form-inline">
                          <label class="form-check-label" style="margin-right: 20px">
                              <input class="form-check-input" type="radio" name="gender" id="gender" value="1" accept="text/html" <?php echo $var = ($parameters['user']->gender == 1)?'checked':'' ?>>
                              Hombre
                              <span class="form-check-sign"></span>
                          </label>
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="gender" id="gender" value="2" accept="text/html" <?php echo $var = ($parameters['user']->gender == 2)?'checked':'' ?>>
                              Mujer
                              <span class="form-check-sign"></span>
                          </label>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="email">Correo</label>
                          <input type="email" class="form-control" name="email" id="email"
                              placeholder="Ingrese un correo" value="<?php echo $parameters['user']->email ?>">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label for="">Tipo de Usuario</label>
                      <div class="form-group form-inline">
                          <label class="form-check-label" style="margin-right: 20px">
                              <input class="form-check-input" type="radio" name="user_type" id="user_type" value="2" accept="text/html" <?php echo $var = ($parameters['user']->user_type == 2)?'checked':'' ?>>
                              Administrador
                              <span class="form-check-sign"></span>
                          </label>
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="user_type" id="user_type" value="1" accept="text/html" <?php echo $var = ($parameters['user']->user_type == 1)?'checked':'' ?>>
                              Usuario
                              <span class="form-check-sign"></span>
                          </label>
                      </div>
                  </div>
              </div>
          </div>
      <input type="submit" class="btn btn-info" name="guardar" value="Guardar">
      </form>
    </div>
                  <!-- Formulario nuevo usuario -->
</div>


<?php require_once('../app/views/inc/footer.php')?>
