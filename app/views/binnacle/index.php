<?php require_once "../app/views/inc/header.php"?>
<div class="card">
    <div class="card-header">
        <h5 class="title">Bitácora</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Operación</th>
                    <th>Nombre de la tabla</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($parameters['registers'] as $key => $register):?>
                <tr>
                    <td class="text-center">
                            <?php echo $register->id_binnacle?>
                    </td>
                    <td>
                            <?php echo $register->operation?>
                    </td>
                    <td>
                        <?php echo $register->table_name?>
                    </td>
                    <td>
                            <?php echo $register->dt?>
                    </td>
                    <td>
                        <a href="<?php echo ROUTE_URL?>/binnacle/info/<?php echo $register->id_binnacle?>" class="btn btn-sm btn-info">
                            Ver detalles
                            <i class="fas fa-file-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">

    </div>
</div>
<?php require_once "../app/views/inc/footer.php"?>