<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iniciar sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo ROUTE_URL?>/assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL?>/assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL?>/assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROUTE_URL?>/assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL?>/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL?>/assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?php echo ROUTE_URL?>/img/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form action="<?php echo ROUTE_URL?>/login" method='POST' id="login"
                    class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                        Iniciar sesión
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Ingrese correo electrónico">
                        <span class="label-input100">Correo</span>
                        <input class="input100" type="email" name="email" placeholder="Ingrese su correo">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Ingrese contraseña">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" type="password" name="password" placeholder="Ingrese su contraseña">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Iniciar sesión
                            </button>
                        </div>
                    </div>

                </form>
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $parameters['errors'] != ''):?>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php echo $parameters['errors']?>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo ROUTE_URL?>/assets/login/js/main.js"></script>

</body>