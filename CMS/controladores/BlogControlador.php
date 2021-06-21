<?php

class BlogControlador
{
    public static function obtenerBlog()
    {
        return Blog::obtenerBlog('blog');
    }
}
