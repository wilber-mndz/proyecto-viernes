<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Mi perfil
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
                                <h3 class="card-title"> Mi perfil </h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo ROUTE_URL?>/PatientPublic/logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Información personal</h4>
                        <hr>

                        <h4>Opciones</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?php echo ROUTE_URL?>/" class="btn btn-primary btn-block">Ir al chat <i class="fas fa-comments"></i></a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-success btn-block">Modificar <i class="fas fa-user-edit"></i> </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-info btn-block">Cambiar contraseña <i class="fas fa-key"></i></a>
                            </div>
                        </div>
                        
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

</html>