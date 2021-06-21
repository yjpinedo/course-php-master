<?php

require_once 'controladores/PlantillaControlador.php';
require_once 'controladores/BlogControlador.php';
require_once 'modelos/Blog.php';
$plantilla = new PlantillaControlador();
$plantilla->traerPlantilla();