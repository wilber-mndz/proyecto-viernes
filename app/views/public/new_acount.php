<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Crear Cuenta
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo ROUTE_URL?>/fa/css/all.min.css">
    <!-- Nucleo Icons -->
    <link href="<?php echo ROUTE_URL?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?php echo ROUTE_URL?>/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo ROUTE_URL?>/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="white-content" style="background-image: url('<?php echo ROUTE_URL?>/img/bg-01.jpg'); background-size: cover;">

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title"> Crear Nueva Cuenta </h3>
                            </div>
                            <div class="col-md-6 text-right">
                               <a class="text-info" href="<?php echo ROUTE_URL?>/"><i class="fas fa-step-backward"></i>
                                   Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            Ingresa tus Datos
                        </div>
                        <form action="<?php echo ROUTE_URL?>/PatientPublic/new_acount" method="post" id="form-add_acount">
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
                                        <!-- llamar las validaciones js -->
                     <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger errors" style="display:none" id="errores"></div>
                        </div>
                    </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--   Core JS Files   -->
    <script src="<?php echo ROUTE_URL?>/assets/js/core/jquery.min.js"></script>
    <script src="<?php echo ROUTE_URL?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo ROUTE_URL?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo ROUTE_URL?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="<?php echo ROUTE_URL?>/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo ROUTE_URL?>/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo ROUTE_URL?>/assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo ROUTE_URL?>/assets/demo/demo.js"></script>
</body>
<footer>
<script src="<?php echo ROUTE_URL?>/js/validaciones.js"></script>
   <!-- Sweet alert -->
   <script src="<?php echo ROUTE_URL?>/js/sweetalert.js"></script>
</footer>
</html>
<?php
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
