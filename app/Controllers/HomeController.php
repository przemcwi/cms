<?php 

require_once './core/Controller.php';
require_once './core/Database.php';
require_once './app/Models/Users.php';



class HomeController extends Controller{
    public function index(){

        $title = "Strona główna"; 

        $user = new Users();
        $user->addUser();

        return $this->render('home', 'main', [
            'title'=> "tytuł strony xd",
            'nie wiem co'=> 'asdasd',
            'kopytko' => 'aaa222'
        ]);

    }
}