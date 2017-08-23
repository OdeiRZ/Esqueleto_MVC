<?php

/**
 * Controlador por defecto home.
 * Llamado cuando no se ha pasado un método a la aplicación.
 */
class Home extends Controller
{
    /**
     * Método por defecto de controlador.
     *
     * @return void
     */
	public function index($name = '') {
        $user = $this->model('user');
        $user->name = $name;
		
        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood
        ]);
	}
}