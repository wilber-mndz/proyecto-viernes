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

    public function update()
    {
       // code...
       $this->view("public/update");
    }

    public function change_password()
    {
       //code
       $this->view("public/change_password");
    }

    public function new_acount($alert = '')
    {

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $patient['name'] = sanitize($_POST['name']);
         $patient['last_name'] = sanitize($_POST['last_name']);
         $patient['birthdate'] = sanitize($_POST['birthdate']);
         $patient['gender'] = sanitize($_POST['gender']);
         $patient['email'] = sanitize($_POST['email']);
         $patient['password'] = hash('sha512', SALT . sanitize($_POST['password']));

         if ($this->ModelPatient->new_acount($patient)) {
            header("location:".ROUTE_URL."/PatientPublic/new_acount/"."saved");
         } else{
            die("Error al guardar los datos");
         }

     }

     $parameters = [
         'alert' => $alert
     ];

     $this->view('public/new_acount', $parameters);

    }
}


?>
