<?php
    // Cargamos las ajustes
    require_once('config/config.php');


    // Cargamos todos los archivos de la carpeta library
    // mas info. http://php.net/manual/es/function.spl-autoload-register.php
    spl_autoload_register(function($className){
        require_once('library/' . $className . '.php');
    });

    // Cargamos helpers
    require_once('helpers/helpers.php');


    

?>