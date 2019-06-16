<?php


    function sanitize($texto){
        return trim(filter_var($texto, FILTER_SANITIZE_STRING));
      }

          // Función que se encarga de verificar que se ha logeado un administrador
    function sessionAdmin(){
        session_start();
            if (!isset($_SESSION['user']) || $_SESSION['user']->user_type == 1) {
                redirect('/admin');
            }
    }

    function sessionUser(){
        session_start();
            if (!isset($_SESSION['user'])) {
                redirect('/login');
            }
    }

    function sessionPatient(){
        // session_start();
            if (!isset($_SESSION['patient'])) {
                redirect('/');
            }
    }

        // Para redireccionar la pagina
        function redirect($pagina){
            header('location:' . ROUTE_URL . $pagina);
        }

?>