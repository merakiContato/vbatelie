<?php

use models\Usuarios;

$usuario = new Usuarios();
echo $usuario->checkLogin("cleber@localhost", "cleber@localhost");

// print_r($_SERVER);