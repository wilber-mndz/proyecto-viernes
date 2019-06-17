<?php
    class Index extends MainController{
        

        public function __construct(){
            session_start();
        }

        public function index(){
            // Verificamos si inicio sesión un administrador o un paciente
            // print_r($_SESSION);
            if (isset($_SESSION['user'])) {
                $message = "Has iniciado sesión como administrador, Bienvenido " . $_SESSION['user']->name;
                $login = 2;
            }elseif(isset($_SESSION['patient'])){
                $message = "Hola " . $_SESSION['patient']->name . ", ¿como puedo ayudarte?";
                $login = 1;
            }else{
                $message = "Hola! Soy Viernes, ¿Como puedo ayudarte?";
                $login = 0;
            }
            $row_messange = '
            <div class="message-row other-message" id="first-message" style="display: none">
                <div class="message-content"><img src="img/viernes.png">
                    <div class="message-text">'. $message.'</div>
                    <div class="message-time">17:49</div>
                </div>
            </div>
            ';
            $parameters = [
                'message' => $row_messange,
                'login' => $login
            ];
            $this->view('chat/index', $parameters);
        }
    }
?>