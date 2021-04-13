<?php

require_once 'conexion.php';
$conexion = new Conexion();

class Formulario
{
    public static function registro($tabla, $datos)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("INSERT INTO $tabla (nombre, correo, clave, token) VALUES (?,?,?,?)");
        $respuesta = $resultado->execute([$datos['nombre'], $datos['correo'], $datos['clave'], $datos['token']]);

        if ($respuesta) {
            return 'ok';
        } else {
            print_r($stmt->errorInfo());
        }

        $resultado = null;
        $stmt      = null;
    }

    public static function obtenerRegistros($tabla)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("SELECT id, nombre, correo, fecha, token FROM $tabla ORDER BY id DESC");
        $respuesta = $resultado->execute();

        if ($respuesta) {
            return $resultado->fetchAll();
        } else {
            print_r($stmt->errorInfo());
        }

        $resultado = null;
        $stmt      = null;
    }

    public static function obtenerRegistro($tabla, $item, $valor)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("SELECT * FROM $tabla WHERE $item = ?");
        $respuesta = $resultado->execute([$valor]);
        if ($respuesta) {
            return $resultado->fetch();
        } else {
            print_r($stmt->errorInfo());
        }
        $resultado = null;
        $stmt      = null;
    }

    public static function ingreso($tabla, $item, $valor)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("SELECT * FROM $tabla WHERE $item = ?");
        $respuesta = $resultado->execute([$valor]);
        if ($respuesta) {
            return $resultado->fetch();
        } else {
            print_r($stmt->errorInfo());
        }
        $resultado = null;
        $stmt      = null;
    }

    public static function actualizar($tabla, $datos)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("UPDATE $tabla SET nombre = ?, correo = ?, token = ? WHERE id = ?");
        $respuesta = $resultado->execute([$datos['nombre'], $datos['correo'], $datos['token'], $datos['id']]);
        if ($respuesta) {
            return 'ok';
        } else {
            print_r($stmt->errorInfo());
        }
        $resultado = null;
        $stmt      = null;
    }

    public static function actualizarIntentos($tabla, $datos)
    {
        $stmt      = Conexion::conectar();
        $resultado = $stmt->prepare("UPDATE $tabla SET intentos = ? WHERE id = ?");
        $respuesta = $resultado->execute([$datos['intentos'], $datos['id']]);
        if ($respuesta) {
            return 'ok';
        } else {
            print_r($stmt->errorInfo());
        }
        $resultado = null;
        $stmt      = null;
    }

    public static function eliminar($tabla, $item, $valor)
    {
        $stmt = Conexion::conectar();
        $resultado = $stmt->prepare("DELETE FROM $tabla WHERE $item = ?");
        $respuesta = $resultado->execute([$valor]);
        if ($respuesta) {
            return 'ok';
        } else {
            print_r($stmt->errorInfo());
        }
        $resultado = null;
        $stmt = null;
    }
}
