<?php

class BlogControlador
{
    public static function obtenerBlog()
    {
        return Blog::obtenerBlog('blog');
    }

    public static function obtenerCategorias()
    {
        return Blog::obtenerCategorias();
    }
}
