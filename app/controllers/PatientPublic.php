<?php
class PatientPublic extends MainController
{
    public function __construct(){
        session_start();
        
        $this->ModelPatient = $this->model("ModelPatient");
    }

    public function index(){
        // Verificaos que el paciente haya iniciado sesión
        
        sessionPatient();



        $this->view("public/index");
    }

    public function login(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             // Limpiamos los datos recibidos por el usuario
             $email = sanitize($_POST['email']);
             // Encriptamos la contraseña
             $password = hash('sha512', SALT . sanitize($_POST['password']));
             $patient = $this->ModelPatient->login($email, $password);
             if ($patient) {
                 $_SESSION['patient'] = $patient;
                 redirect('/');
             }else{
                 echo "no hay datos";
             }
        }
    }

    public function logout(){

        // Destruimos la sesión
        session_destroy();

        // Redireccionamos
        redirect('/');
    }
}


?>