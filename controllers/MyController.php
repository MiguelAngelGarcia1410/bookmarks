<?php

class MyController
{

    public $tabla;

    public $campos;

    public $vista;

    function __construct($arg = NULL)
    {
        $this->tabla = $arg;
    } //fin construct

    public function create($datos)
    {
        $respuesta = MyModel::mdlCrear($this->tabla, $datos, $this->campos);

        if ($respuesta == "ok") {
            echo "<script>

                   swal('Guardado', '', 'success');
                   setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);

                 </script>";
        } else {
            echo "
                <script>

                swal('Oops, Problemas técnicos', 'Intenta más tarde o contacta al administrador', 'error');
                  setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);

                </script>";
        }
    } //fin create

    public function ctrMostrar($item = NULL, $valor = NULL, $consulta = NULL)
    {
        $respuesta = MyModel::mdlMostrar($this->tabla, $item, $valor, $consulta);

        return $respuesta;
    } //fin Mostrar

    public function update($datos, $pk = NULL, $valorpk = NULL)
    {
        $respuesta = MyModel::mdlEditar($this->tabla, $datos, $this->campos, $pk, $valorpk);

        if ($respuesta == "ok") {
            echo "<script>
                    swal('Actualizado', 'Los datos han sido actualizados', 'success');
                    setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);

                 </script>";
        } else {
            echo
                "<script>
                
                swal('Oops, problemas técnicos', 'Intenta más tarde o contacta al administrador',   'error');
                setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);
            
                </script>";
        }
    } //fin Update

    public function delete($datos, $pk = NULL)
    {
        $respuesta = MyModel::mdlBorrar($this->tabla, $datos, $pk);

        if ($respuesta == "ok") {
            echo "<script>
                    swal('Eliminado', 'Los datos han sido actualizados', 'success');
                    setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);
                 </script>";
        } else {
            echo
                "<script>
                
                swal('Oops, problemas técnicos', 'Intenta más tarde o contacta al administrador',   'error');
                setTimeout('window.location.assign(\'" . $this->vista . "\')', 1000);
            
                </script>";
        }
    } //Fin Delete
}