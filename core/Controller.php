<?php 


class Controller{
    protected function render($view, $layout, $data = []) {
        // bez tego nie mozna złapać zmiennych
        extract($data);

        $viewPath = __DIR__ . '/../app/Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new Exception("Widok '$view' nie istnieje ($viewPath)");
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        $layoutPath = __DIR__ . '/../app/Views/layouts/' .  $layout . '.php';

        if (!file_exists($layoutPath)) {
            throw new Exception("Layout '$layout' nie istnieje ($layoutPath)");
        }

        include $layoutPath;
    }
}