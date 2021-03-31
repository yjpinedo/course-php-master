<?php

class FormularioControlador
{
    static public function registro()
    {
        if (isset($_POST['nombre']) ) {
            return 'ok';
        }
    }
}

?>