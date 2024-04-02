<?php
require_once "Conexion.php";
class MyModel
{
	static public function mdlMostrar($tabla, $item, $valor, $consulta = NULL)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
$filas=$stmt->fetch();
			return $filas;
		} else {
			if ($consulta != NULL) {
				$stmt = Conexion::conectar()->prepare($consulta);
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			}


			$stmt->execute();

			$filas=$stmt->fetchAll();
			return $filas;
			
		}

		$stmt = null;
	} //Fin mdlMostrar

	static public function mdlCrear($tabla, $datos, $campos)
	{
		$sql = "INSERT INTO $tabla (";
		$values = "VALUES (";

		$i = 0;
		foreach ($campos as $key) {
			if ($i < count($campos) - 1) {
				$sql = $sql . $key . " , ";
				$values = $values . ":" . $key . ", ";
			} else {
				$sql = $sql . $key . " ) ";
				$values = $values . ":" . $key . ") ";
			}
			$i++;
		}

		$sql = $sql . $values;
		$stmt = Conexion::conectar()->prepare($sql);

		if ($stmt->execute($datos)) {
			$stmt=null;
			return "ok";
		} else {
			$stmt=null;
			return "error";
		}

		$stmt = null;
	} //Fin mdl Crear

	static public function mdlEditar($tabla, $datos, $campos, $pk = NULL, $valorpk = NULL)
	{
		$sql = "UPDATE $tabla SET ";

		$i = 0;
		foreach ($campos as $key) {

			if ($i < count($campos) - 1) {
				$sql = $sql . $key . " = :" . $key . " , ";
			} else {
				$sql = $sql . $key . " = :" . $key;
			}
			$i++;
		}
		if ($pk != NULL) {
			$sql = $sql . " WHERE $pk = $valorpk";
		} else {
			$sql = $sql . " WHERE id = :id";
		}


		$stmt = Conexion::conectar()->prepare($sql);

		if ($stmt->execute($datos)) {
			$stmt=null;
			return "ok";
		} else {
			$stmt=null;
			return "error";
		}

		$stmt = null;
	} //Fin mdlEditar


	static public function mdlBorrar($tabla, $datos, $pk = NULL)
	{
		if ($pk != NULL) {
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $pk = :id");
		} else {
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		}

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$stmt=null;
			return "ok";
		} else {
			$stmt=null;
			return "error";
		}

		$stmt = null;
	} //Fin mdlBorrar
}