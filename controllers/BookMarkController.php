<?php

class BookMarkController extends MyController
{

    function __construct($arg = null)
    {
        parent::__construct($arg);
        $this->tabla = "bookmark";
        $this->campos = array("title", "url");
        $this->vista = "bookmark";
    }

    public static function mostrarMaterial($item = NULL, $valor = NULL)
    {
        $tabla = "bookmark";
        $respuesta = MyModel::mdlMostrar($tabla, $item, $valor);
        return $respuesta;
    }

    public function crearMaterial()
    {
        if (isset($_POST["txtNuevoMaterial"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtNuevoMaterial"])) {
                $datos = array(
                    "title" => strtoupper($_POST["txtNuevoMaterial"]),
                    "url" => $_POST["txtNuevoURL"]
                );
                parent::create($datos);
            }
        }
    }

    public function modificarMaterial()
    {
        if (isset($_POST["txtEditarMaterial"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtEditarMaterial"])) {
                $datos = array(
                    "title" => strtoupper($_POST["txtEditarMaterial"]),
                    "url" => $_POST["txtEditarURL"]
                );
                $pk = "id";
                $valorpk = $_POST["txtEditarClave"];
                parent::update($datos, $pk, $valorpk);
            }
        }
    }

    public static function ctrBorrarUlr() {
        if(isset($_GET["id"])){
            $tabla = "bookmark";
            $datos = $_GET["id"];
            $respuesta = MyModel::mdlBorrar($tabla, $datos);
            if($respuesta == "ok"){
                echo '<script>

				swal({
					  type: "success",
					  title: "La URL ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "bookmark";

								}
							})

				</script>';
            }
        }
    }
}