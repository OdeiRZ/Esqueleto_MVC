<?php

include_once 'View.php';

/**
 * Clase Controlador.
 * Llamado cuando no se ha pasado un método a la aplicación.
 */
class Controller
{
   /**
     * Renderiza una vista
     *
     * @param string $viewName Nombre de la vista a incluir
     * @param array  $data Cualquier dato necesario en la vista
     * @return void
     */
	public function view($viewName, $data = [])
	{
		// Creamos nueva vista y mostramos contenido
        $view = new View($viewName, $data);
		// Hacemos uso de método __toString para mostrar vista
        echo $view;
	}
	
    /**
     * Carga un modelo
     *
     * @param string $model Nombre de modelo a cargar
     * @return object
     */
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}
}