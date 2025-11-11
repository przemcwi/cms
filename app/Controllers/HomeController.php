<?php 

require_once './core/Controller.php';

class HomeController extends Controller{
    public function index(){

        $title = "Strona główna"; 

        return $this->render('home', 'main', [
            'title'=> "tytuł strony xd",
            'nie wiem co'=> 'asdasd',
            'kopytko' => 'aaa222'
        ]);

    }
}