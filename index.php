<?php

/*
 * Si el directorio público no es la carpeta raíz y el usuario intenta acceder
 * al proyecto, lo redirigimos al directorio público.
 */
header('Location: public/');

die();