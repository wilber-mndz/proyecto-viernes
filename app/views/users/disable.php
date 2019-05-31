<?php require_once('../app/views/inc/header.php')?>
<div class="card">
    <div class="card-header">
        <h5 class="title">Desactivar usuario</h5>
    </div>
    <div class="card-body">
        <div class="alert alert-warning">
            <div class="alert_disable_user">
                <i class="fas fa-exclamation-triangle"></i>
                ¿Esta seguro que decea desactivar este usuario?
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" name="first_name" id="first_name"
                        value="<?php echo $parameters['user']->name?>" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"
                        value="<?php echo $parameters['user']->last_name?>" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input type="text" class="form-control" name="birthdate" id="birthdate"
                        value="<?php echo date('Y-m-d', strtotime($parameters['user']->birthdate))?>" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="birthdate">Sexo</label>
                    <input type="text" class="form-control" name="gender" id="gender"
                        value="<?php echo $var = ($parameters['user']->gender == 1)? 'Hombre' : 'Mujer'?>" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_type">Tipo de usuario</label>
                    <select class="form-control" name="user_type" id="user_type" disabled>
                        <option value="1">Usuario</option>
                        <option selected="true" value="2">Administrador</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="<?php echo $parameters['user']->email?>" disabled>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Si desactivas un usuario ya no podrá iniciar sesión en el sistema pero su información se conservara y podrá ser activado nuevamente
                </div>
            </div>
        </div>

        <button class="btn btn-danger" onclick="alert('Estamos trabajando en esta función disculpe las molestias')">Desactivar</button>
        <a href="<?php echo ROUTE_URL?>/users" class="btn btn-default">Cancelar</a>

    </div>
    <div class="card-footer">

    </div>
</div>
<?php require_once('../app/views/inc/footer.php')?>