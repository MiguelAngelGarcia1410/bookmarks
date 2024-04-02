<?php

//require_once "controllers/MaterialesController.php";

spl_autoload_register(function($clase){
    $clase = ucwords($clase);
    if(preg_match('/Controller$/', $clase))
        require_once "controllers/" . $clase . ".php";
    else
        require_once "models/" . $clase .  ".php";
});

$plantilla = new PlantillaController();
$plantilla->cargarPaginaPrincipal();