<?php
class Conversation extends MainController
{

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
        error_reporting(0);
        header('Content-type: application/json; charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos y pasamos a mayúsculas la cadena enviada por el usuario
            $menssage = strtoupper(filter_var(trim($_POST['message'], 'FILTER_SANITIZE_STRING')));

            // Dividimos la cadena por palabra y almacenamos en un array
            $keywords = explode(' ', $menssage);

            // Creamos nuestra consulta
            $query = "SELECT TOP 1 r.texto, p.idrespuesta, (COUNT(p.idrespuesta)) AS N 
            FROM prueba.dbo.palabras AS p
            INNER JOIN prueba.dbo.respuestas AS r
            ON p.idrespuesta = r.idrespuesta
            WHERE";

            foreach ($keywords as $key => $word) {
                $query .= " palabra LIKE '$word' OR";
            }

            // Eliminamos el ultimo " OR" que nos agrega el foreach
            $query = substr($query, 0, -3);
            
            $query .= "
            GROUP BY r.idrespuesta
            ORDER BY N DESC";

            $db = new Sql;

            $db->query($query);
            $answer = $db->register();

            if ($answer) {
                # code...
                // Retornamos la respuesta codificada en utf8
                echo utf8_encode($answer->texto);
            } else {
                echo utf8_encode('Aun no tengo respuesta para eso');
            }


        }
    }
    
}


?>