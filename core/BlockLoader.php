<?php

class BlockLoader
{
    public static function render(string $type, array $data = []): string
    {
        $view = __DIR__ . '/../app/Views/blocks/' . $type . '.php';

        if (!file_exists($view)) {
            return "<!-- Block view '$type' not found -->";
        }

        $block = $data; 

        ob_start();
        include $view;
        return ob_get_clean(); // zwraca HTML
    }
}