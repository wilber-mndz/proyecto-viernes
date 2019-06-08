<?php require_once('../app/views/inc/header.php')?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="title">Pacientes</h5>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?php echo ROUTE_URL?>/patient/add_patient" class="btn btn-info btn-fab btn-icon btn-round">
                    <i class="fas fa-user-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Fecha de registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parameters['patients'] as $key => $patient):?>
                <tr>
                    <td class="text-center"><?php echo $patient->id_patient?></td>
                    <td><?php echo $patient->name?></td>
                    <td><?php echo $patient->age?></td>
                    <td><?php echo $var = ($patient->gender == 1)?'Hombre':'Mujer'?></td>
                    <!-- Cambiamos el formato de la fecha y hora con date_format y DateTime -->
                    <td><?php echo date_format(new DateTime($patient->insert_date), 'H:i:s d-m-Y')?></td>
                    <td class="td-actions text-right">
                        <a href="<?php echo ROUTE_URL?>/patient/info/<?php echo $patient->id_patient?>" rel="tooltip"
                            class="btn btn-info btn-sm btn-round btn-icon">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo ROUTE_URL?>/patient/update/<?php echo $patient->id_patient?>" rel="tooltip"
                            class="btn btn-info btn-sm btn-round btn-icon">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="<?php echo ROUTE_URL?>/patient/change_password/<?php echo $patient->id_patient?>"
                            rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                            <i class="fas fa-key"></i>
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
<?php require_once('../app/views/inc/footer.php');
// Alertas
if ($parameters['alert'] == 'saved') {
    echo
    "<script>
        Swal.fire({
        title: 'Datos guardados',
        text: 'Nuevo paciente registrado exitosamente',
        type: 'success',
        confirmButtonText: 'Aceptar'
      })
    </script>";
} 
?>