<?php
require_once "../controllers/MyController.php";
require_once "../models/MyModel.php";

class MyAjax
{
	
	public $item;
	public $valor;
	public $tabla;

	function __construct($item1 = NULL, $valor1 = NULL, $tabla1= NULL)
	{
		$this->item=$item1;
		$this->valor=$valor1;
		$this->tabla=$tabla1;

	}

	public function ajaxEditar()
	{

		$controlador =new  MyController($this->tabla);
          
		$respuesta = $controlador -> ctrMostrar($this->item,$this->valor);
		
		echo json_encode($respuesta);
	}
	
}