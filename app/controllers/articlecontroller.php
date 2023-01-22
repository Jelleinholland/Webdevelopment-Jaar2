<?php
require __DIR__ . '/../services/articleservice.php';

class ArticleController
{

    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $model = $this->articleService->getAll();

        require __DIR__ . '/../views/article/index.php';
    }
    public function getOne(){
        $update_id = $_GET['id'];
        $model = $this->articleService->getOne($update_id);
        require __DIR__ . '/../views/updatingarticle/index.php';
        return $model;
    }
    public function single()
    {
        $model = $this->articleService->getAll();

        require __DIR__ . '/../views/article/single.php';
    }
    public function addingarticle()
    {
        require __DIR__ . '/../views/addingarticle/index.php';
    }
    public function updatearticle()
    {
        require __DIR__ . '/../views/updatingarticle/index.php';
    }
    public function deletingarticle()
    {
        require __DIR__ . '/../views/deletingarticle/index.php';
    }
    public function articleAdd()
    {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); 

            // check all individual post fields
            if (isset($_POST['title'])) {
                $title = htmlspecialchars( $_POST['title']);
            }

            if (isset($_POST['author'])) {
                $author = htmlspecialchars($_POST['author']);
            }

            if (isset($_POST['content'])) {
                $content = htmlspecialchars($_POST['content']);
            }

            // if all fields are not empty then insert new product
            if (!empty($title) && !empty($author) && !empty($content)) {
                $this->articleService->addarticle($title, $author, $content);
                header('Location: /article');
            } else {
                header('Location: /artcile?error=adding-of-article-failed!'); // else show error message
            }
        
    }
    public function articleUpdate()
    {
        try{
                $id = $_SESSION['updatingid'];
                if (isset($_POST['title'])) {
                    $title =  htmlspecialchars($_POST['title']);
                }
    
                if (isset($_POST['author'])) {
                    $author = htmlspecialchars($_POST['author']);
                }
    
                if (isset($_POST['content'])) {
                    $content = htmlspecialchars($_POST['content']);
                }
                $this->articleService->updatearticle($id, $title, $author, $content);
                header('Location: /adminarticle');
        }
        catch(Exception $e){
            echo $e;
            header('Location: /adminarticle?error=updating-of-article-failed!');
        }
    }
     
    public function articleDelete()
    {
        $submit_id = $_GET['id'];
        $this->articleService->deletearticle($submit_id);
    }

    public function addToCart()
    {   
        
            if(empty($_SESSION["cart"])){
                $_SESSION["cart"]=array();
            }
        array_push($_SESSION['cart'],$_GET['id']);
        
        // $cartArray = array();
        // $_SESSION["cart"]=array();
        // $article_id = $_GET['id'];
        // array_push($_SESSION['cart'],$article_id);
        header('Location: /article');
    }
    
}
