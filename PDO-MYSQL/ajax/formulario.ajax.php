<?php

require_once '../controladores/formulario.controlador.php';
require_once '../modelos/formulario.modelo.php';

class FormularioAjax
{
    public $validarCorreo = '';
    public function ajaxValidarCorreo()
    {
        $respuesta = FormularioControlador::obtenerRegistro('correo', $this->validarCorreo);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['validarCorreo'])) {
    $formularioAjax = new FormularioAjax();
    $formularioAjax->validarCorreo = $_POST['validarCorreo'];
    $formularioAjax->ajaxValidarCorreo();
}
