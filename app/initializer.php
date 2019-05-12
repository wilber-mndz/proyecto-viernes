<?php
    // Cargamos las librerías
    require_once('config/config.php');


    // Cargamos todos los archivos de la carpeta library
    // mas info. http://php.net/manual/es/function.spl-autoload-register.php
    // spl_autoload_register(function($className){
    //     require_once('library/' . $className . '.php');
    // });

    require_once("library/Core.php");
    require_once("library/MainController.php");
    require_once("library/Sql.php");
    

?>