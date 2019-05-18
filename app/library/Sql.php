<?php
    // Clase para conectarse a la base de datos y ejecutar consultas PDO
    class Sql{
        private $host = 'SOUL:5000';
        private $db = 'prueba';
        private $user = 'sa';
        private $pass = '123456';

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            // Ajustes de la conexion
           
            $dsn = "dblib:host=" . $this->host. ";dbname=" . $this->db; 

            // Ajustes para conexion persistente
            $option = array(
                PDO::ATTR_PERSISTENT => true
            );

            // Ajustes para conexion persistente con errores
            // Habilitar en desarrollo
            // $option = array(
            //     PDO::ATTR_PERSISTENT => true,
            //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // );

            // Creamos nuestra conexión PDO
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
                $this->dbh->exec('SET NAMES utf8');
            } catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }

        }

        // Preparamos la consulta
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Vinculamos la consulta con bind
        public function bind($parameter, $value, $type = null){

            if (is_null($type)) {

                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }

            }

            $this->stmt->bindValue($parameter, $value, $type);
        }

        // Ejecutamos la consulta
        public function execute(){
            return $this->stmt->execute();
        }

        // Obtenemos múltiples registros
        public function registers(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Obtenemos un único registro
        public function register(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Obtenemos cantidad de filas
        public function rowCount(){
            $this->execute();
            return $this->stmt->rowCount();
        }
    }

?>
