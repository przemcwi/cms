<?php 

require_once './app/Models/Pages.php';

class PageController extends Controller{
    public function index(): void{

        $page = new Pages();

        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $pageid = $page->getPageId($uri);

        d($uri, $pageid);

        $blocks = [
                ['type' => 'hero',
                'data' => [
                    'title' => 'Pierwszy xd blok',
                    'subtitle' => 'To jest testowy hero blok'
                ]],
                ['type' => 'hero',
                'data' => [
                    'title' => 'Drugi blok',
                    'subtitle' => 'Jeszcze jeden testowy blok'
                ]]
                ];


        $this->render('page', 'main', [
            'title'=> "Strona nr 1",
            'blocks' => $blocks
        ]);

    }
}
