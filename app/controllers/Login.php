<?php

class Login extends MainController{

    public function __construct(){
        session_start();
        if (isset($_SESSION['user'])) {
            redirect('/admin');
        }
        $this->ModelLogin = $this->model('ModelLogin');

    }

    /**
     * index
     * 
     * Carga la vista correspondiente a login y verifica las credenciales
     * 
     * Esta función se encarga de mostrar la vista del login y de recibir los datos enviados 
     * por el usuario, limpiarlos para evitar la inyección de código y encriptar la contraseña 
     * con el algoritmo sha512 mas un SALT para mejorar la seguridad
     * 
     * @author Wilber Méndez
     */
    public function index(){

        // Variable que almacenara los errores que se den al iniciar sesión
        $errors = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos los datos recibidos por el usuario
            $email = sanitize($_POST['email']);
            // Encriptamos la contraseña
            $password = hash('sha512', SALT . sanitize($_POST['password']));

            // Enviamos los datos al modelo y almacenamos su resultado
            $user = $this->ModelLogin->login($email, $password);

            if ($user) {
                // Si se obtuvo información iniciamos sesión y diseccionamos
                $_SESSION['user'] = $user;
                redirect('/admin');
            }else{
                // Si los datos no coinciden con la base de datos generamos un error
                $errors .= '<p>Correo o contraseña incorrecta</p>';
            }
        }

        // Ordenamos los parámetros que enviaremos a la vista
        $parameters = [
            'title' => 'Login',
            'errors' => $errors
        ];

        // Cargamos la vista
        $this->view('login/index', $parameters);
    }

    /**
     * logout
     * 
     * Función para cerrar sesión
     *
     * @author Wilber Méndez
     */
    public function logout(){
        // Destruimos la sesión
        session_destroy();
        // Redireccionamos al login
        redirect('/login');
    }
}

?>