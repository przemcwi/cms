<?php 

class HomeController{
    public function index(){

        $title = "Strona główna"; 

        ob_start();
        include __DIR__ . '/../Views/home.php';
        
        $content = ob_get_clean();

        include __DIR__ . '/../Views/layout.php';
    }
}