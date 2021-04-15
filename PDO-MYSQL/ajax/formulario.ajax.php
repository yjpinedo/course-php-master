<?php

require_once '../controladores/formulario.controlador.php';
require_once '../modelos/formulario.modelo.php';

class FormularioAjax
{
    public $validarCorreo = '';
    public $id  = '';

    public function ajaxValidarCorreo()
    {
        $respuesta = FormularioControlador::obtenerRegistro('correo', $this->validarCorreo);
        echo json_encode($respuesta);
    }

    public function ajaxValidarId()
    {
        $respuesta = FormularioControlador::obtenerRegistro('id', $this->id);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['validarCorreo'])) {
    $formularioAjax                = new FormularioAjax();
    $formularioAjax->validarCorreo = $_POST['validarCorreo'];
    $formularioAjax->ajaxValidarCorreo();
}

if (isset($_POST['id'])) {
    $formularioAjax               = new FormularioAjax();
    $formularioAjax->id = $_POST['id'];
    $formularioAjax->ajaxValidarId();
}
