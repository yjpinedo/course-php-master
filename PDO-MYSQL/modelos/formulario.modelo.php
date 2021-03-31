<?php

require_once 'conexion.php';
$conexion = new Conexion();

class formulario
{
    public static function registro(string $tabla, array $datos)
    {
        $stmt = Conexion::conectar();
        $resultado = $stmt->prepare("INSERT INTO $tabla (nombre, correo, clave) VALUES (?,?,?)");
        $respuesta = $resultado->execute([$datos['nombre'], $datos['correo'], $datos['clave']]);

        if ($respuesta) {
            return 'ok';
        } else {
            print_r($stmt->errorInfo());
        }

        $resultado = null;
        $stmt = null;
    }

    public static function obtenerRegistros(string $tabla)
    {
        $stmt = Conexion::conectar();
        $resultado = $stmt->prepare("SELECT id, nombre, correo, fecha FROM $tabla ORDER BY id DESC");
        $respuesta = $resultado->execute();
        if ($respuesta) {
            return $resultado->fetchAll();
        } else {
            print_r($stmt->errorInfo());
        }

        $resultado = null;
        $stmt = null;
    }


}