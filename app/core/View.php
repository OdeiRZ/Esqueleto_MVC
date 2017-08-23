<?php

/**
 * Clase View.
 *
 * Realiza las gestiones derivadas de las vistas a nivel general.
 *
 */
class View
{
    /**
     * Fichero de vista
     *
     * @var string
     */
    private $file;

    /**
     * Datos de vista
     *
     * @var array
     */
    private $data;

    /**
     * Plantilla actual
     *
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Inicializa una nueva vista
     *
     * @param $file
     */
    public function __construct($file, $data = null)
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem(INC_ROOT . '/app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader,
            [
                'cache' => INC_ROOT . '/app/cache',
            ]);
        $this->twig->addGlobal('ASSET_ROOT', ASSET_ROOT);
        $this->twig->addGlobal('HTTP_ROOT', HTTP_ROOT);
    }

    /**
     * Devuelve la vista formateada
     *
     * @return string
     */
    public function __toString()
    {
        return $this->parseView();
    }

    /**
     * Formatea la vista a string usando Twig
     *
     * @return string
     */
    public function parseView()
    {
        $file = $this->file . '.php';

        try {
            if (is_null($this->data)) {
                return $this->twig->render($file);
            }
            return $this->twig->render($file, $this->data);
        } catch(Twig_Error_Loader $e) {
            return $this->getErrorMessage('loader', $e->getMessage());
        } catch(Twig_Error_Runtime $e) {
            return $this->getErrorMessage('runtime', $e->getMessage());
        } catch(Twig_Error_Syntax $e) {
            return $this->getErrorMessage('syntax', $e->getMessage());
        }
    }

    /**
     * Devuelve posibles errores generados
     *
     * @return string
     */
    private function getErrorMessage($errorType, $errorMessage)
    {
        return sprintf("Un error %s ocurrió: %s", $errorType, $errorMessage);
    }
} 