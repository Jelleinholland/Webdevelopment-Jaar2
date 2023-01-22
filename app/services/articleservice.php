<?php
require __DIR__ . '/../repositories/articlerepository.php';

class ArticleService {
    public function getAll() {
        $repository = new ArticleRepository();
        return $repository->getAll();
    }
    
    //adding a article to the database
    public function addarticle($title, $author, $content)
    {
        $repository = new articlerepository();
        $repository->Addarticle($title, $author, $content);
    }
    public function getOne($id){
        $repository = new articlerepository();
        return $repository->getOne($id);
    }
    //Update a article to the database
    public function updatearticle($id, $title, $author, $content)
    {
        $repository = new articlerepository();
        $repository->UpdateArticle($id, $title, $author, $content);
    }
    //Deleting a article to the database
    public function deletearticle($title)
    {
        $repository = new articlerepository();
        $repository->DeleteArticle($title);
    }
    //selecting a article from the database with selection
    public function selectaricles($selection)
    {
        $repository = new articlerepository();
        return $repository->SelectArticle($selection);
    }
}