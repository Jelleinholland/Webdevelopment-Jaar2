<?php
require __DIR__ . '/../services/articleservice.php';

class ArticleController
{

    private $articleService;

    //initialize services
    function __construct()
    {
        $this->articleService = new ArticleService();
    }
    public function index()
    {
        require __DIR__ . '/../views/article/index.php';
    }
    //Get the article from the DB that the user intends to update
    public function getOne(){
        $update_id = $_GET['id'];
        $model = $this->articleService->getOne($update_id);
        require __DIR__ . '/../views/updatingarticle/index.php';
        return $model;
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
            //Sanitize the intput from the user
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
                //setting variables
                $id = $_SESSION['updatingid'];
                // check all individual post fields & sanitize them
                if (isset($_POST['title'])) {
                    $title =  htmlspecialchars($_POST['title']);
                }
    
                if (isset($_POST['author'])) {
                    $author = htmlspecialchars($_POST['author']);
                }
    
                if (isset($_POST['content'])) {
                    $content = htmlspecialchars($_POST['content']);
                }
                //with the checked & sanitized variables the article is updated
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
        //detele the article with the id of the selected article
        $submit_id = $_GET['id'];
        $this->articleService->deletearticle($submit_id);
        header('Location: /adminarticle');
    }
    public function addToCart()
    {   
        //checks if the variable is empty   
        if(empty($_SESSION["cart"])){
            //if the variable is empty the array is initialized
            $_SESSION["cart"]=array();
        }
        array_push($_SESSION['cart'],$_GET['id']);
        header('Location: /article');
    }
    
}
