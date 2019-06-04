<?php
class ModelBinnacle{
    private $db;

    public function __construct(){
        $this->db = new Sql;
    }

    /**
     * get_binnacle_registers
     * 
     * Obtiene los registros de la bitácora
     * 
     * Obtiene la información de forma general de los registros
     * de la bitácora para ser mostrados en la tabla principal
     * del modulo bitácora
     *
     * @return [object]
     * @author Wilber Méndez
     */
    public function get_binnacle_registers(){
        // Preparamos nuestra consulta
        $this->db->query(
            "SELECT id_binnacle, operation, table_name, CONVERT(datetime, dt, 105) AS dt 
            FROM dbfriday.dbo.tbl_binnacle"
        );

        // Retornamos los registros obtenidos
        return $this->db->registers();
    }

    /**
     * get_binnacle_register
     * 
     * Obtiene la información de un registro de la bitácora
     * 
     * Obtiene la información del registro cuyo id se pasa por parámetro
     * a la función.
     *
     * @param [type] $id, id del registro que querenos obtener
     * @return [object]
     * @author Wilber Méndez
     */
    public function get_binnacle_register($id){

        // Preparamos la consulta
        $this->db->query(
            "SELECT id_binnacle, operation, table_name, new_data, old_data, dt
            FROM dbfriday.dbo.tbl_binnacle WHERE id_binnacle = CONVERT(INT, :id)"
        );

        // Vinculamos los datos
        $this->db->bind(':id', $id);

        // Retornamos el registro obtenido
        return $this->db->register();
    }

    
}
?>