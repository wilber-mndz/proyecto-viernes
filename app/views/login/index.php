<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Proyecto Viernes <?php echo $var = (isset($parameters['title']))? ' - '.$parameters['title'] : ''?>
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
    <!-- Mis estilos css -->
    <link href="<?php echo ROUTE_URL?>/css/d_styles.css" rel="stylesheet" />

</head>

<body class="white-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login">
                    <div class="card-header text-center">
                        <h2 class="title">Iniciar sesión</h2>
                    </div>
                    <form action="<?php echo ROUTE_URL?>/login" method = 'POST' id="login">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" name="email" id = "email" placeholder="Ingrese su correo" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su contraseña" required>
                                </div>
                            </div>
                        </div>
                            
                 <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $parameters['errors'] != ''):?>
                    <div class="row">
                         <div class="col-md-12">
                            <div class="alert alert-danger">
                              <?php echo $parameters['errors']?>
                            </div>
                        </div>
                        </div>
                <?php endif;?> 

                   <!-- llama los errores de las validaciones de js -->
             <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger errores" id="errores" style="display:none">

                </div>
                </div>
                </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Iniciar sesión</button>
                    </div>
                    </form>
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
    <!-- Sweet alert -->
    <script src="<?php echo ROUTE_URL?>/js/sweetalert.js"></script>
      <!-- llama las validaciones js -->
  <script src="<?php echo ROUTE_URL?>/js/validaciones.js"></script>
</body>

</html>