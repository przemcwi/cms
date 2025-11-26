<?php 

require_once './core/Controller.php';

class AdminController extends Controller{

    public function index(){

        return $this->render('admin', 'main');
    }

}