<?php
require __DIR__ . '/../services/articleservice.php';

class adminarticleController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        //Get the articles from the database when the page is loaded
        $articles = $this->articleService->getAll();
        require __DIR__ . '/../views/adminarticle/index.php';
    }
}