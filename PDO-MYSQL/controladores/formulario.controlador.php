<?php

class FormularioControlador
{
    public static function registro()
    {
        if (isset($_POST['nombre'])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre'])) {
                if (preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/', $_POST['correo'])) {
                    if (preg_match('/^[0-9a-zA-Z]+$/', $_POST['clave'])) {
                        $tabla = 'registros';
                        $datos = [
                            'nombre' => $_POST['nombre'],
                            'correo' => $_POST['correo'],
                            'clave'  => $_POST['clave'],
                        ];

                        return Formulario::registro($tabla, $datos);
                    } else {
                        return 'clave';
                    }
                } else {
                    return 'correo';
                }
            } else {
                return 'nombre';
            }
        }
    }

    public static function obtenerRegistros()
    {
        $registros = Formulario::obtenerRegistros('registros');
        return $registros;
    }

    public static function obtenerRegistro($item, $valor)
    {
        $registro = Formulario::obtenerRegistro('registros', $item, $valor);
        return $registro;
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

    public static function actuaizar()
    {
        if (isset($_POST['nombre'])) {
            $tabla = 'registros';
            $datos = [
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],
                'id'     => $_POST['id'],
            ];
            $respuesta = Formulario::actualizar($tabla, $datos);
            return $respuesta;
        }
    }

    public function eliminar()
    {
        if (isset($_POST['id'])) {
            $respuesta = Formulario::eliminar('registros', 'id', $_POST['id']);
            if ($respuesta == 'ok') {
                echo
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            } else {
            }
        }
    }
}
