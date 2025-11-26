<?php 

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once './config/debug.php';
require __DIR__ . '/vendor/autoload.php';


require_once './core/Router.php';
require_once './app/Controllers/HomeController.php';
require_once './app/Controllers/AdminController.php';
require_once './app/Controllers/AuthControler.php';

$router = new Router();

$router->get('/', ['HomeController', 'index']);
$router->get('/admin', ['AdminController', 'index'], 'auth');

$router->get('/login', ['AuthControler', 'index']);
$router->post('/login', ['AuthControler', 'login']);
$router->get('/logout', ['AuthControler', 'logout']);

$router->resolve();