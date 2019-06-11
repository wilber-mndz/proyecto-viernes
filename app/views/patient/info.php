<?php require_once('../app/views/inc/header.php')?>
<div class="card">
    <div class="card-header">
        <h5 class="title">Perfil del paciente</h5>
        <a class="text-info" href="<?php echo ROUTE_URL?>/patient"><i class="fas fa-step-backward"></i>
            Regresar</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p>Información personal</p>
                <hr>
                <p><b>Nombre: </b> <?php echo $parameters['patient']->name. ' '.$parameters['patient']->last_name?></p>
                <p><b>Sexo: </b> <?php echo $var = ($parameters['patient']->gender == '1')? 'Hombre' : 'Mujer'?></p>
                <p><b>Fecha de nacimiento: </b> <?php echo date_format(new DateTime($parameters['patient']->birthdate), 'd-m-Y')?></p>
                <p><b>Edad: </b><?php echo $parameters['patient']->age?> años</p>
                <p><b>Correo: </b><?php echo $parameters['patient']->email?></p>
            </div>
            <div class="col-md-6">
            <p>Evaluación psicológica</p>
                <hr>
                <p><b>Personalidad: </b> <?php echo $var = ($parameters['patient']->personality == ' ')? 'Aun no determinada' : $parameters['patient']->personality ?></p>
                <p><b>Carácter: </b> <?php echo $var = ($parameters['patient']->character == ' ')? 'Aun no determinado' : $parameters['patient']->character ?></p>
                <p><b>Coeficiente intelectual: </b> <?php echo $var = ($parameters['patient']->ci == ' ')? 'Aun no determinado' : $parameters['patient']->ci ?></p>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                Información de registro
                <hr>
                    <p>Paciente registrado por <b><?php echo $parameters['patient']->user_insert?></b> fecha de registro <b><?php echo date_format(new DateTime($parameters['patient']->insert_date), 'd-m-Y H:i:s')?></b></p>
                    <?php if ($parameters['patient']->insert_date != $parameters['patient']->update_date ):?>
                        <p>Paciente modificado por <b><?php echo $parameters['patient']->user_update?></b> fecha de registro <b><?php echo date_format(new DateTime($parameters['patient']->update_date), 'd-m-Y H:i:s')?></b></p>
                    <?php endif;?>
            </div>
        </div>
    </div>
    <div class="card-footer">

    </div>
</div>
<?php require_once('../app/views/inc/footer.php')?>
