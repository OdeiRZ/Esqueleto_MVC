<?php
 
use Whoops\Run as WhoopsRun;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;

/**
 * Clase App.
 *
 * Maneja las peticiones de cada llamada a la aplicación y enruta
 * al controlador elegido junto al método seleccionado.
 *
 */
class App
{
    /**
     * Almacena el controlador de la URL.
     *
     * @var string
     */
    protected $controller = 'home';
	
    /**
     * Almacena el método de la URL.
     * @var string
     */
    protected $method = 'index';
	
    /**
     * Almacena los parámetros de la URL.
     * @var array
     */
    protected $params = [];
	
    /**
     * Método constructor por defecto.
     */
    public function __construct()
    {
        // Obtenemos y parseamos URL
        $url = $this->parseUrl();
        // Manejamos posibles errores
        //$this->initWhoopsErrorHandler();
		
        // Si el controlador existe lo establecemos 
        if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
		
        require_once '../app/controllers/' . ucfirst($this->controller) . '.php';
		
        $this->controller = new $this->controller();
		
        // Si se pasa un segundo parámetro, capturamos el posible método
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
		
        // Capturamos parámetros extra si los hubiera
        $this->params = $url ? array_values($url) : [];
		
        // Llamamos al método del controlador recibido y enviamos parámetros si los hubiese
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
	
    /**
     * Envía cualquier excepción o error de PHP al manejador de errores.
     *
     * @return $this
     */    
    public function initWhoopsErrorHandler()
    {
        $whoops = new WhoopsRun();
        $handler = new WhoopsPrettyPageHandler();
        $whoops->pushHandler($handler)->register();
        return $this;
    }
	
    /**
     * Convierte la URL de la petición actual, guardando la referencia tanto
	 * del controlador como del método de ese controlador.
     *
     * @return void
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Formatea la url y la devuelve 'saneada'
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}