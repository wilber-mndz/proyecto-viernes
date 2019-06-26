<?php
class Conversation extends MainController
{
    public function __construct(){
        session_start();

        $this->Modelfriday = $this->model('ModelFriday');
    }

    /**
     * Función Index
     *
     * Se encarga de buscar las respuestas a lo que se pregunta en el chat
     * 
     * Obtiene una cadena mediante AJAX con el mensaje que el usuario enviá,
     * separa cada palabra y la pasa a mayúscula para meterlas en un arreglo
     * con dicho arreglo se crea una consulta donde por cada palabra se 
     * agrega un 'OR LIKE "palabra"'  en base a la coincidencia de palabras 
     * claves se devuelve una respuesta y se retorna a la petición AJAX
     * 
     * @author Wilber Méndez
     */
    public function index(){
        // error_reporting(0);  
        header('Content-type: application/json; charset=utf-8');
        
        
        // Limpiamos y pasamos a mayúsculas la cadena enviada por el usuario 
        // $message = strtoupper(filter_var(trim($_POST['message'], 'FILTER_SANITIZE_STRING')));

        $_POST['message'] =  sanitize($_POST['message']);

        $message = strtoupper((trim($_POST['message'])));

        // echo $message;   

        // Eliminamos los acentos y símbolos de puntuación
        $message = str_replace('Á', 'A', $message);
        $message = str_replace('É', 'E', $message);
        $message = str_replace('Í', 'I', $message);
        $message = str_replace('Ó', 'O', $message);
        $message = str_replace('Ú', 'U', $message);
        
        $message = str_replace('á', 'A', $message);
        $message = str_replace('é', 'E', $message);
        $message = str_replace('í', 'I', $message);
        $message = str_replace('ó', 'O', $message);
        $message = str_replace('ú', 'U', $message);
        
        // $message = str_replace('T', 't', $message);
        $message = str_replace('?', '', $message);
        
        // Activar aprendizaje, SOLO PARA ADMINISTRADORES
        if(isset($_SESSION['user']->user_type) && $_SESSION['user']->user_type == 2 && $message == 'ACTIVAR MODO APRENDIZAJE'){
            
            $_SESSION['friday']['learning'] = 1;
            echo "Modo de aprendizaje activado. Dime algo y luego enseñame como responder"; 

        } else if(isset($_SESSION['friday']['learning']) && $_SESSION['friday']['learning'] == 1){
            
            if(!isset($_SESSION['friday']['keywords'])){
                $_SESSION['friday']['keywords'] = $message;
                echo "Que debería responder cuando se me diga " .'"'.$message.'"';

            }else if(isset($_SESSION['friday']['answer']) && $message == 'SI'){
                $keywords = explode(' ', $_SESSION['friday']['keywords']);
                echo "¿Desea guardar?";
                $_SESSION['friday']['learning'] = 2;
            }else if(isset($_SESSION['friday']['answer']) && $message == 'NO'){
                echo "Que debería responder cuando se me diga " .'"'.$_SESSION['friday']['keywords'].'"';
            }else{

                $_SESSION['friday']['answer'] = strtolower($message);
                echo "Entiendo que debería responder " .'"'.$_SESSION['friday']['answer'].'"';
            }
        // Confirmar que se decea guardar la información  
        } else if ( isset($_SESSION['friday']['learning']) && $_SESSION['friday']['learning'] == 2 && $message == 'SI') {
            
            // Guardamos la información
            if ($this->Modelfriday->add_answer( $_SESSION['friday']['answer'], $_SESSION['user']->id_user) ) {
                echo "Nueva información guardada";
                unset($_SESSION['friday']['keywords']);
                unset($_SESSION['friday']['answer']);
                $_SESSION['friday']['learning'] == 0;
            }else{
                echo 'Parece que algo salio mal';
            }
            


        } else if (isset($_SESSION['friday']['learning']) && $_SESSION['friday']['learning'] == 2 && $message != 'SI'){
            echo "Acción cancelada";
            $_SESSION['friday']['learning'] == 0;
        } else{
        // Dividimos la cadena por palabra y almacenamos en un array
        $keywords = explode(' ', $message);
        
            // Creamos nuestra consulta
            $query = "SELECT TOP 1 a.answer, a.id_answer, (COUNT(k.id_answer)) AS N, a.n_keywords  
            FROM dbfriday.dbo.tbl_keywords AS k
            INNER JOIN dbfriday.dbo.tbl_answers AS a
            ON k.id_answer = a.id_answer
            WHERE";
    
            foreach ($keywords as $key => $word) {
                $query .= " keyword LIKE '$word' OR";
            }
    
            // Eliminamos el ultimo " OR" que nos agrega el foreach
            $query = substr($query, 0, -3);
            
            $query .= "
            GROUP BY a.id_answer
            ORDER BY N DESC";
    
            // echo $query;    
    
            $db = new Sql;
    
            $db->query($query);
            $answer = $db->register();

            // echo $answer->N .' '. $answer->n_keywords;

            if ($answer AND $answer->N  >= $answer->n_keywords * 0.75) {

                    echo ($answer->answer);    
                    if (isset($_SESSION['patient'])) {
                        $this->Modelfriday->add_history_message($_SESSION['patient']->id_patient, sanitize($_POST['message']), $answer->id_answer);
                    }

            } else {
                if ($keywords[0] == 'SOY') {
                    $answer = '';
                    foreach ($keywords as $key => $word) {
                        if ($key != 0) {
                            $answer .= ' ' . strtolower($word) . '';
                        }
                    }
    
                    echo '¿Porque crees que eres ' . $answer . '?';
                }else {
                    echo 'Hablame de tus problemas';
                }

            }

        }
    }

    public function history(){
        // Obtenemos el historial del paciente.
        $history = $this->Modelfriday->get_history($_SESSION['patient']->id_patient);

        $chat_message_list = '';
        foreach ($history as $key => $message) {

            $dt = date_format(new DateTime($message->update_date), 'd-m H:i:s');

            $chat_message_list .= '
            <div class="message-row you-message">
            <div class="message-content">
                <div class="message-text"> '.$message->message.' </div>
                <div class="message-time">'.$dt.'</div>
            </div>
            </div>
            <div class="message-row other-message">
                <div class="message-content"><img src="img/viernes.png">
                    <div class="message-text">'. $message->answer.'</div>
                    <div class="message-time">'.$dt.'</div>
                </div>
            </div>
            ';
            
        }

        echo $chat_message_list;
        
    }
    
}


?>