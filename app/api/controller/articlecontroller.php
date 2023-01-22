<?php
    require_once __DIR__ . '/../../services/articleservice.php';
class ArticleController{

    private $articleService;

    // initialize services
    function __construct(){
        $this->articleService = new ArticleService();
    }
    public function index(){

        if($_SERVER['REQUEST_METHOD']==='GET')
        {
            //getting the articles from the database
            $articles = $this->articleService->getAll();
            echo json_encode($articles);
        }
    }
}