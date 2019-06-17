<?php require_once('../app/views/inc/header.php')?>
<div class="card">
    <div class="card-header">
        <h5 class="title">Perfil del paciente</h5>
        <a class="text-info" href="<?php echo ROUTE_URL?>/friday"><i class="fas fa-step-backward"></i>
            Regresar</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <p>Palabras claves</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button style="top: -20px;margin-bottom: -20px;margin-top: 0px;"
                            class="btn btn-info btn-fab btn-icon btn-round btn-sm" data-toggle="modal"
                            data-target="#new_user">
                            <!-- <i class="fas fa-comment"></i> -->
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <?php foreach ($parameters['keywords'] as $key => $keyword):?>
                <div class="row">
                    <div class="col-md-6">
                        <p><?php echo $keyword['keyword']?></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button style="top: -20px;margin-bottom: -20px;margin-top: 0px;"
                            class="btn btn-danger btn-fab btn-icon btn-round btn-sm" data-toggle="modal"
                            data-target="#new_user">
                            <!-- <i class="fas fa-comment"></i> -->
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <?php endforeach;?>
            </div>
            <div class="col-md-6">
                <p>Respuesta</p>
                <hr>
                <p class="text-justify"><?php echo $parameters['entry'][0]->answer?></p>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                Información de registro
                <hr>
            </div>
        </div>
    </div>
    <div class="card-footer">

    </div>
</div>
<?php require_once('../app/views/inc/footer.php')?>