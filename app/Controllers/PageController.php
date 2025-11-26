<?php 

require_once './app/Models/Pages.php';
require_once './app/Models/Blocks.php';

class PageController extends Controller{
    public function index(): void{

        $page = new Pages();

        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $pageid = $page->getPageId($uri);

        $blocks = new Blocks();
        $b = $blocks->getBlocksByPageId($pageid);

            $this->render('page', 'main', [
            'title'=> "Strona nr 1",
            'blocks' => $b
        ]);

    }
}
