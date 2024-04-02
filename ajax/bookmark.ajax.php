<?php

require_once "../ajax/MyAjax.php";
require_once "../models/MyModel.php";
include "../controllers/BookMarkController.php";

class AjaxUrl{
	public $id;

	public function ajaxEdtarUrl(){
		$item = "id";
		$valor = $this->id;
		$respuesta = BookMarkController::mostrarMaterial($item, $valor);

		echo json_encode($respuesta);
	}
}

if(isset($_POST["editar"])){
	$editar = new AjaxUrl();
	$editar->id = $_POST["editar"];
	$editar->ajaxEdtarUrl();
}