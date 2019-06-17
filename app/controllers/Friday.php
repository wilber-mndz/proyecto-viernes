<?php
class Friday extends MainController{
    
    public function __construct(){
        sessionUser();
        $this->ModelFriday = $this->model('ModelFriday');
    }

    public function index(){

        // Obtenemos la información de la base de datos
        $results = $this->ModelFriday->get_answers();

        // Declaramos arreglo que contendra las respuestas y sus palabras claves
        $table_answer = [];
        $con = 0; // Contador
        $con2 = -1; //Segundo contador

        // Armamos una tabla con las respuestas y palabras claves
        foreach ($results as $key => $row) {
            $con = $row->id_answer;
            if ($con != $con2 ) {
                if (isset($table_answer[$con-1]['keywords'])) {
                    $table_answer[$con-1]['keywords'] = substr($table_answer[$con-1]['keywords'], 0 ,-2);
                }
                $table_answer[$con]['id_answer'] = $row->id_answer;
                $table_answer[$con]['answer'] = $row->answer;
                $table_answer[$con]['user'] = $row->name;
                $table_answer[$con]['keywords'] = '';
            }
            $table_answer[$con]['keywords'] .= $row->keyword .', ';
            $con2 = $row->id_answer;
        }

        $parameters = [
            'menu' => 'Viernes',
            'answers' => $table_answer
        ];

        $this->view('friday/index', $parameters);
    }

    public function add(){

        if ($_SERVER['REQUEST_METHOD']== 'POST') {

            $entry['message'] = sanitize($_POST['message']); 
            $entry['answer'] = sanitize($_POST['answer']);

            // Separamos el mensaje en las palabras claves
            $keywords = explode(" ", strtoupper($entry['message']));

            // Guardamos la respuesta
            if($this->ModelFriday->add_answer($entry['answer'], $_SESSION['user']->id_user)){

                // Obtenemos el id de la respuesta recién ingresada
                $id_answer = $this->ModelFriday->last_id();

                // Guardamos las palabras claves
                foreach ($keywords as $key => $keyword) {
                    if (!$this->ModelFriday->add_keyword($keyword, $id_answer->id)) {
                        die('Algo salio mal');
                    }
                }
            }
        }

        $parameters = [
            'menu' => 'Viernes'
        ];

        $this->view('friday/add', $parameters);
    }

    public function update($id){

        $entry = $this->ModelFriday->get_entry_info($id);

        $keywords = [];
        foreach ($entry as $key => $keyword) {

            $keywords[$key]['id'] = $keyword->id_keyword;
            $keywords[$key]['keyword'] = $keyword->keyword;
            
        }

        $parameters = [
            "menu" => 'Viernes',
            "keywords" => $keywords,
            "entry" => $entry
        ];

        $this->view('friday/update', $parameters);
    }
}

?>