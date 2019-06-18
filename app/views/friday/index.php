<?php require_once "../app/views/inc/header.php"?>
<div class="card card-chart">
    <div class="card-header">
        <h5 class="title">Viernes</h5>
    </div>
    <div class="card-body text-center">
        <div class="row">
            <div class="col-md-8">
                <b>Administración de inteligencia artificial</b>
            </div>
            <div class="col-md-4">
                <a href="<?php echo ROUTE_URL?>/friday/add" style="margin-top: -12px;" class="btn btn-info">Nueva entrada <i class="fas fa-comments" style="margin-left: 5px;"></i><i class="fas fa-plus fa-xs"></i></a>
            </div>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="40%">Respuestas</th>
                    <th>Palabras claves</th>
                    <th>Usuario que enseñó</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parameters['answers'] as $key => $answer):?>
                <tr>
                    <td><?php echo $answer['id_answer']?></td>
                    <td class="text-justify"><?php echo $answer['answer']?></td>
                    <td class="text-justify"><?php echo $answer['keywords']?></td>
                    <td class="text-justify"><?php echo $answer['user']?></td>
                    <td class="td-actions text-right">
                        <a href="<?php echo ROUTE_URL?>/friday/update/<?php echo $answer['id_answer']?>" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="tim-icons icon-settings"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once "../app/views/inc/footer.php"?>