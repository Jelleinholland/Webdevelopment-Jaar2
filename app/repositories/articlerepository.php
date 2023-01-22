<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/article.php';

class ArticleRepository extends Repository {

    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM article");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    //Select the article from the database based on the id of the article
    function getOne($id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM article WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $article = $stmt->fetchAll();

            return $article;
            

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    //inserting a article in the database with the user input
    public function AddArticle($title, $author, $content)
    {
        //set the correct format of the datetime
        $posted_at = date("Y/m/d h:i:s");
        try {
            $sqlquery = "INSERT INTO article (title, author, content, posted_at) VALUES(:title, :author, :content, :posted_at)";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':posted_at', $posted_at);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    //updating a article in the database with the user input
    public function UpdateArticle($id, $title, $author, $content)
    {
        //set the correct format of the datetime
        $posted_at = date("Y/m/d h:i:s");
        try {
            $sqlquery = "UPDATE article SET title=:title, author=:author, content=:content, posted_at=:posted_at WHERE id=:id";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':posted_at', $posted_at);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    //Deleting a article based on the userinput
    public function DeleteArticle($id)
    {
        try {
            $sqlquery = "DELETE FROM article WHERE id = :id";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    //selecting a article based on the cart selection
    public function SelectArticle($selection){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM article WHERE id IN ({$selection})");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $article = $stmt->fetchAll();

            return $article;
            

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}