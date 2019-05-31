<?php
class Users extends MainController
{
    public function __construct(){
        sessionAdmin();
        $this->ModelUsers = $this->model('ModelUsers');
    }

    /**
     * index
     * 
     * Método principal del controlador usuarios
     * 
     * Carga la vista principal del modulo usuarios
     * Guarda la recibe y enviá al modelo la información de los nuevos administrativos
     * usuarios que se registran al sistema
     *
     * @param string $alert , identifica si se debe mostrar un sweet alert
     * 
     * @author Wilber Méndez
     */
    public function index($alert = ''){

        // Si se recibe información de los usuarios por el método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos los datos para prevenir inyección de código
            $user['name'] = sanitize($_POST['first_name']);
            $user['last_name'] = sanitize($_POST['last_name']);
            $user['birthdate'] = sanitize($_POST['birthdate']);
            $user['gender'] = sanitize($_POST['gender']);
            $user['user_type'] = sanitize($_POST['user_type']);
            $user['email'] = sanitize($_POST['email']);
            // encrestamos la contraseña utilizando el algoritmo sha512 agregando un SALT para mas sefuridad
            $user['password'] = hash('sha512', SALT . sanitize($_POST['password']));

            
            if ($this->ModelUsers->add_user($user)) {
                redirect('/users/saved');
            } else {
                die('Error al guardar los datos');
            }
        }

        // Solicitamos al modelo los usuarios del sistema
        $users = $this->ModelUsers->get_users();

        // Preparamos los datos que se mostraran en nuestra vista
        $parameters = [
            'users' => $users,
            'alert' => $alert
        ];

        // Llamamos la vista y enviamos los parámetros
        $this->view('users/index', $parameters);
    }

    /**
     * disable
     * 
     * Función para desactivar usuarios
     * 
     * Esta función cambia el estado de un usuario a desactivado
     * recibiendo como parámetro su id de esta forma el usuario
     * no podrá iniciar sesión de nuevo hasta que lo vuelvan a 
     * activar
     *
     * @param [type] $id
     * @return void
     */
    public function disable($id){

        // Obtenemos la información del usuario que vamos a desactivar
        $user = $this->ModelUsers->get_user($id);

        // Preparamos los parámetros para enviar a la vista
        $parameters = [
            'menu' => 'users',
            'user' => $user
        ];
        $this->view('users/disable', $parameters);
    }
    
}


?>