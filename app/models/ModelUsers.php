<?php

class ModelUsers
{
  private $db;

    public function __construct(){
        $this->db = new Sql;
    }


     /**
      * add_user
      *
      * Registra los datos de un nuevo usuario
      *
      * Ejecuta un procedimiento almacenado que guarda los datos de los nuevos usuarios
      * el procedimiento se encarga de generar el id automáticamente.
      *
      * La conexión y consulta se realiza mediante PDO
      *
      * @param [array] $user, arreglo que contiene la información del nuevo usuario.
      * @return [bool], retorna true si la consulta se ejecuto con éxito y false si no.
      * @author Wilber Méndez
      */
     public function add_user($user){

         // Preparamos nuestra consulta
         $this->db->query(
             "add_user @name = :name, @last_name = :last_name, @birthdate = :birthdate,
             @gender = :gender, @email = :email, @password = :password, @user_type = :user_type"
         );

         // Vinculamos los datos a nuestra consulta preparada
         $this->db->bind(':name', $user['name']);
         $this->db->bind(':last_name', $user['last_name']);
         $this->db->bind(':birthdate', $user['birthdate']);
         $this->db->bind(':gender', $user['gender']);
         $this->db->bind(':email', $user['email']);
         $this->db->bind(':password', $user['password']);
         $this->db->bind(':user_type', $user['user_type']);

         // Ejecutamos consulta
         if ($this->db->execute()) {
             return true;  // si se ejecuta con éxito retorna true
         } else {
             return false;  // si ocurre algún error retorna false
         }
     }

     /**
      * get_users
      *
      * Obtiene información de los usuarios
      *
      * Obtiene la información de los usuarios administrativos activos
      * para ser mostrada en la tabla principal del modulo usuarios
      *
      * @return [object]
      * @author Wilber Méndez
      */

    public function get_users(){

        // Preparamos nuestra consulta, concatenamos nombre y apellido
        // calculamos la edad a partir de la fecha de nacimiento
        $this->db->query(
            "SELECT id_user, (name +' '+ last_name) AS name,
            DATEDIFF(hour,birthdate,GETDATE())/8766 AS age, gender, user_type
            FROM dbfriday.dbo.tbl_users WHERE status = 1"
        );
        // Ejecutamos la consulta y devolvemos los registros
        return $this->db->registers();
    }

    public function get_user($id){

        // Preparamos nuestra consulta
        $this->db->query(
            "SELECT id_user, name, last_name, CONVERT(VARCHAR(10), birthdate, 105) AS birthdate, gender, email, user_type, status
            FROM dbfriday.dbo.tbl_users WHERE id_user = CONVERT(int, :id)"
        );

        // Vinculamos los datos a nuestra consulta preparada
        $this->db->bind(':id', $id);

        // Retornamos el registro obtenido
        return $this->db->register();


    }



    public function update_user($id, $user){
      $this->db->query(
           "update_user @name = :name, @last_name = :last_name, @birthdate = :birthdate,
           @gender = :gender, @email = :email, @user_type = :user_type, @id = :id"
       );

                        // Vinculamos los datos a nuestra consulta preparada
          $this->db->bind(':name', $user['name']);
          $this->db->bind(':last_name', $user['last_name']);
          $this->db->bind(':birthdate', $user['birthdate']);
          $this->db->bind(':gender', $user['gender']);
          $this->db->bind(':email', $user['email']);
          $this->db->bind(':user_type', $user['user_type']);

          $this->db->bind(':id', $id);

          if ($this->db->execute()) {
            return true;
          }else {
            return false;
          }


    }

}


?>
