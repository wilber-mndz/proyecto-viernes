<?php
class ModelLogin{
    private $db;

    public function __construct(){
        $this->db = new Sql;
    }

    /**
     * login
     * 
     * Verifica si el usuario o contraseña enviados corresponden a un usuario
     * 
     * Recibe desde el controlador el correo y la contraseña encriptada enviada por el usuario
     * para consultarlos con los datos almacenados en la base de datos y devolver la información 
     * del usuario que coincida con esos datos
     *
     * @param [string] $email
     * @param [string] $password
     * @return [object]
     * 
     * @author Wilber Méndez
     */
    public function login($email, $password){

        // Preparamos nuestra consulta
        $this->db->query(
            "SELECT id_user, (name +' '+ last_name) AS name, birthdate, gender, email, user_type
            FROM dbfriday.dbo.tbl_users WHERE email = :email AND password = :password"
        );

        // Vinculamos los datos
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        
        // Devolvemos los resultados
        return $this->db->register();
    }
}
?>