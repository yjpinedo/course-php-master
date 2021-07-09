<?php

require_once 'Conexion.php';
class Blog
{
    public static function obtenerBlog()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM blog");
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }

    public static function obtenerCategorias()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}