<?php 

require_once './core/Controller.php';

class AdminController extends Controller{

    public function index(): void{

        $this->render('admin', 'main');
    }

}