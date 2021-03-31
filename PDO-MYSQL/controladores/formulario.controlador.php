<?php

class FormularioControlador
{
    static public function registro()
    {
        if (isset($_POST['nombre']) ) {
            $tabla = 'registros';
            $datos = [
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],
                'clave' => $_POST['clave'],
            ];

            return Formulario::registro($tabla, $datos);
        }
    }

    public static function obtenerRegistros() {
        $registros = Formulario::obtenerRegistros('registros');
        return $registros;
    }

    public function ingreso()
    {

    }
}

?>