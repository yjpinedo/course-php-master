<?php

require_once 'Conexion.php';
class Blog
{
    public static function obtenerBlog() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM blog");
        $stmt->execute();
        return $stmt->fetch();
    }
}