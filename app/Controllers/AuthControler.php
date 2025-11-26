<?php

require_once './core/Controller.php';

class AuthControler extends Controller{
    public function index(): void{
        $this->render('login', 'main');
    }

    public function login(): void{

        $email = $_POST['email'] ?? '';
        $_SESSION['user_id'] = 1; // Na razie wpisujemy na sztywno ID admina
        $_SESSION['user_email'] = $email;
        header('Location: /admin');
    }

    public function logout(): void {
        // Usuń wszystko z sesji
        $_SESSION = [];
        
        // Zniszcz ciasteczko sesyjne
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Zniszcz sesję na serwerze
        session_destroy();

        header('Location: /login');
        exit;
    }
}