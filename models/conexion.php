<?php

class Conexion{

	private static $link;
	private static $configuracion = [
		"driver" => "mysql",
        "host" => "localhost",
        "database" => "bookmarks",
        "port" => "3306",
        "charset" => "utf8"
	];

	static public function conectar(){
		try {
			$CONTROLADOR = self::$configuracion["driver"];
            $SERVIDOR = self::$configuracion["host"];
            $BASE_DATOS = self::$configuracion["database"];
            $PUERTO = self::$configuracion["port"];
			$CODIFICACION = self::$configuracion["charset"];
			
			$url = "{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"
                    . "dbname={$BASE_DATOS};charset={$CODIFICACION}";
			//Se crea la conexión.
			
			if (self::$link == null) {
				self::$link = new PDO($url, "root", "", array(PDO::ATTR_PERSISTENT => true));
				self::$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
				return self::$link;
			}else{
				return self::$link;
			}
		} catch (Exception $exc) {
			echo "Error: " . $exc->getMessage();
		}
	}
}