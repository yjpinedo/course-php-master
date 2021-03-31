<?php

class FormularioControlador
{
    public static function registro()
    {
        if (isset($_POST['nombre'])) {
            $tabla = 'registros';
            $datos = [
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],
                'clave'  => $_POST['clave'],
            ];

            return Formulario::registro($tabla, $datos);
        }
    }

    public static function obtenerRegistros()
    {
        $registros = Formulario::obtenerRegistros('registros');
        return $registros;
    }

    public function ingreso()
    {
        if (isset($_POST['correo'])) {
            $registros = Formulario::ingreso('registros', 'correo', $_POST['correo']);
            if ($registros['correo'] == $_POST['correo'] && $registros['clave'] == $_POST['clave']) {
                $_SESSION['validarIngreso'] = 'ok';
                echo
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            } else {
                echo
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo
                '<div class="alert alert-danger text-center" role="alert">Error en el ingreso!</div>';
            }
        }
    }
}
