<?php
class Patient extends MainController
{
    public function __construct(){
        sessionUser();
        $this->ModelPatient = $this->model('ModelPatient');
    }

    public function index($alert = ''){
        $patients = $this->ModelPatient->get_patients();

        $parameters = [
            'menu' => 'Pacientes',
            'patients' => $patients,
            'alert' => $alert
        ];
        $this->view('patient/index', $parameters);
    }

    public function add_patient(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $patient['name'] = sanitize($_POST['name']);
            $patient['last_name'] = sanitize($_POST['last_name']);
            $patient['birthdate'] = sanitize($_POST['birthdate']);
            $patient['gender'] = sanitize($_POST['gender']);
            $patient['email'] = sanitize($_POST['email']);
            $patient['password'] = hash('sha512', SALT . sanitize($_POST['password']));
            $patient['id_user'] = $_SESSION['user']->id_user;

            if ($this->ModelPatient->add_patient($patient)) {
                redirect('/patient/saved');
            } else{
                die("Error al guardar los datos");
            }

        }

        $parameters = [
            'menu' => 'Pacientes'
        ];

        $this->view('patient/add_patient', $parameters  );
    }

    public function info($id = 0){

        // Obtenemos la información del paciente
        $patient = $this->ModelPatient->get_patient($id);

        // Si no hay un paciente con ese id redireccionamos
        if (!$patient) {
            redirect('/patient');
        }

        // Preparamentos para enviar a la vista
        $parameters = [
            'menu' => 'Pacientes',
            'patient' => $patient
        ];

        // llamamos la vista y mandamos los parámetros
        $this->view('patient/info', $parameters);
    }

    public function update($id = 0, $alert = ''){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos los datos para prevenir inyección de código
            $patient['name'] = sanitize($_POST['name']);
            $patient['last_name'] = sanitize($_POST['last_name']);
            $patient['birthdate'] = sanitize($_POST['birthdate']);
            $patient['gender'] = sanitize($_POST['gender']);
            $patient['email'] = sanitize($_POST['email']);
            $patient['id_user'] = $_SESSION['user']->id_user;

            if ($this->ModelPatient->update_patient($id, $patient)) {
                header("location:".ROUTE_URL."/patient/update/".$id."/saved");
                //redirect('/users/saved');
            } else {
                die('Error al guardar los datos');
            }
      }

        $patient = $this->ModelPatient->get_patient($id);
        if (!$patient) {
             header('location:'.ROUTE_URL.'/patient');
        }

        $parameters = [
            'menu' => 'Pacientes',
            'patient' => $patient,
            'alert' => $alert
        ];

        $this->view('patient/update', $parameters);
    }

    public function change_password($id = 0, $alert = ''){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos los datos para prevenir inyección de código
            $patient['password'] = hash('sha512', SALT . sanitize($_POST['password']));
            $patient['id_user'] = $_SESSION['user']->id_user;


            if ($this->ModelPatient->update_password($id, $patient)) {
            header("location:".ROUTE_URL."/patient/change_password/".$id."/saved");
                //redirect('/users/saved');
            } else {
                die('Error al guardar los datos');
            }
      }

        $patient = $this->ModelPatient->get_patient($id);
        if (!$patient) {
            header('location:'.ROUTE_URL.'/change_password');
        }

        $parameters = [
            'menu' => 'Pacientes',
            'patient' => $patient,
            'alert' => $alert
        ];

        $this->view('patient/change_password', $parameters);

    }
}


?>
