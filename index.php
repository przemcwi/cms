l<?php 

require_once './core/Router.php';
require_once './app/Controllers/HomeController.php';

$router = new Router();

$router->get('/', ['HomeController', 'index']);

$router->resolve();