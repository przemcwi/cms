<?php

class Router{

    // tablica przechoquje to co ta się zadziać na danym url
    private $routes = [];

    // rejestracja metody get
    public function get($path, $callback){
        $this->routes['GET'][$path] = $callback;
    }
    // rejestracja posta i przypisanie callbacka
    public function post($path, $callback){
        $this->routes['GET'][$path] = $callback;
    }

        public function resolve() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Sprawdź, czy taka trasa istnieje
        $callback = $this->routes[$method]['/' . $uri] ?? false;

        if (!$callback) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        // Jeśli callback to np. ['HomeController', 'index'] to wywołuje metode tej klasy
        if (is_array($callback)) {
            $controller = new $callback[0];
            $method = $callback[1];
            return $controller->$method();
        }

        // jak callback to funkcja to ja wywolujemy
        return call_user_func($callback);
    }
}
