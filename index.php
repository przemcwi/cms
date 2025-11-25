<?php 

declare(strict_types=1);
require_once './config/debug.php';
require __DIR__ . '/vendor/autoload.php';


require_once './core/Router.php';
require_once './app/Controllers/HomeController.php';

$router = new Router();

$router->get('/', ['HomeController', 'index']);

$router->resolve();