<?php
    /*
    Mapear la url ingresada en el navegador
    1 - Controlador
    2 - Método
    3 - Parámetro
    */

    class Core{
        protected $currentController = 'Index';
        protected $currentMethod = 'index';
        protected $parameters = [];

        public function __construct(){
            $url = $this->getUrl();

            // ====================== OBTENEMOS EL CONTROLADOR ======================
            // Verificamos si el controlador enviado por url existe
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php' )) {
                // Si existe lo convertimos en el controlador actual
                $this->currentController = ucwords($url[0]);
                
                // Eliminamos del arreglo el indice del controlador
                unset($url[0]);
            }

            // Incluimos el nuevo controlador
            require_once('../app/controllers/' . $this->currentController . '.php');
            // Creamos una instancia de la clase del controlador
            $this->currentController = new $this->currentController;

            // ====================== OBTENEMOS EL MÉTODO ===========================
            // Verificamos si se paso algún método por url
            if (isset($url[1])) {
                // Verificamos si el método enviado por url existe 
                if (method_exists($this->currentController, $url[1])) {
                    // Si existe lo convertimos en el método actual
                    $this->currentMethod = $url[1];

                    // Eliminamos del arreglo el indice del método
                    unset($url[1]);
                }
            }

            // ====================== OBTENEMOS EL PARÁMETROS =========================
            // Al eliminar de $url el controlador y el método solo nos quedarían los 
            // parámetros con array_value crearemos un nuevo arreglo que contendrá
            // todos parámetros: mas info. http://php.net/manual/es/function.array-values.php
            $this->parameters = $url ? array_values($url) : [];

            // Hacemos un llamado del método de nuestra función y pasamos nuestros parámetros
            // mas info: http://php.net/manual/es/function.call-user-func-array.php
            call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);


        }

        public function getUrl(){
            // echo $_GET['url'];

            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);

                $url = explode('/', $url);
                return $url;
            }
        }
    }

?>