<?php

class Router{

    // tablica przechoquje to co ta się zadziać na danym url
    private $routes = [];

    // rejestracja metody get
    public function get(string $path, array $callback, string|null $middleware = null): void{
        $this->routes['GET'][$path] = [
            'callback' => $callback,
            'middleware' => $middleware 
        ];
    }
    // rejestracja posta i przypisanie callbacka
    public function post(string $path, array $callback, string|null $middleware = null): void{
        $this->routes['POST'][$path] = [
            'callback' => $callback,
            'middleware' => $middleware 
        ];
    }

    public function resolve(): mixed {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Sprawdź, czy taka trasa istnieje
        $callback = $this->routes[$method]['/' . $uri]['callback'] ?? false;
        $middleware = $this->routes[$method]['/' . $uri]['middleware'] ?? null;

        if (!$callback) {
            http_response_code(404);
            // echo "404 Not Found";
            require './app/Views/404.php';
            return null;
        }

        // Sprawdza czy uytkownik jest zalogowany jak nie to przekierowuje do logowania
        if($middleware === 'auth'){

            if (!isset($_SESSION['user_id'])) {
                header('Location: /login'); 
                exit;
            }
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
