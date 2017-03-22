<?php


@$classe = $_GET['classe'];
@$metodo = $_GET['metodo'];




require_once('../controller/UsuarioController.php');
require_once('../controller/MesaController.php');


$controller = new $classe();

if (!empty($_GET['parametro'])) {
    @$parametro = $_GET['parametro'];
    echo $controller->$metodo($parametro);
    
}else{
    
    echo $controller->$metodo();
}







