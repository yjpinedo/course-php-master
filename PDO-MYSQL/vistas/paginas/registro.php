<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrínico</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" id="clave" , name="clave">
            </div>
        </div>
        <?php
        $formulario = FormularioControlador::registro();
        if ($formulario == 'ok') {
            // Funcion para limpiar la cache del navegador
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-success text-center" role="alert">
                Registro exitoso!
              </div>';
        }
        if ($formulario == 'nombre')  {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">
                Error nombre!
              </div>';
        }

        if ($formulario == 'correo')  {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">
                Error correo!
              </div>';
        }

        if ($formulario == 'clave')  {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">
                Error correo!
              </div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Registrar <i class="fas fa-paper-plane"></i></button>
    </form>

</div>