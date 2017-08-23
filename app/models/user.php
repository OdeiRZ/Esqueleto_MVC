<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Clase User que extiende de Eloquent.
 *
 * Gestiona las tareas relacionadas con los usuarios a nivel general.
 *
 */
class User extends Eloquent
{
	public $name;
}