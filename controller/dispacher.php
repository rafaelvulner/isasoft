<?php


@$classe = $_GET['classe'];
@$metodo = $_GET['metodo'];



require_once('../controller/UsuarioController.php');
require_once('../controller/MesaController.php');


$controller = new $classe();

echo $controller->$metodo();





