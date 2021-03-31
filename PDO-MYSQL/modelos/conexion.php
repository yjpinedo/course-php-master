<?php

class Conexion
{
    public static function conectar()
    {
        # PDO(nombre del servidor; nombre base de datos, nombre de usuario, contraeña)
        $link = new PDO('mysql:host=localhost;dbname=master-php-course', 'root', '');
        $link->exec('set names utf8');
        return $link;
    }
}