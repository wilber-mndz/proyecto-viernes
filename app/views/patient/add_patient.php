<?php require_once('../app/views/inc/header.php')?>
<div class="card">
    <div class="card-header">
        <h5 class="title">Registrar paciente</h5>
        <a class="text-info" href="<?php echo ROUTE_URL?>/patient"><i class="fas fa-step-backward"></i>
            Regresar</a>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            Registrar nuevo paciente
        </div>
        <form action="<?php echo ROUTE_URL?>/patient/add_patient" method="post" id="form-add_patient">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                            placeholder="Ingrese nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            aria-describedby="emailHelp" placeholder="Ingrese nombre">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input type="text" class="form-control" id="birthdate" name="birthdate"
                            aria-describedby="emailHelp" placeholder="Ingrese fecha de nacimiento">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Sexo</label>
                    <div class="form-group form-inline">
                        <label class="form-check-label" style="margin-right: 20px">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="1"
                                accept="text/html">
                            Hombre
                            <span class="form-check-sign"></span>
                        </label>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="2"
                                accept="text/html">
                            Mujer
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            placeholder="Ingrese correo">
                        <small id="emailHelp" class="form-text text-muted">Necesitaras el correo
                            electrónico para iniciar sesión</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password2">Repetir contraseña</label>
                        <input type="password" class="form-control" id="password2" name="password2"
                            placeholder="Repetir contraseña">
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Guardar</button>

             <!-- llama los errores de las validaciones de js -->
             <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger errores" id="errores" style="display:none">

                </div>
                </div>
                </div>

        </form>

    </div>
    <div class="card-footer">

    </div>
</div>
<?php require_once('../app/views/inc/footer.php')?>