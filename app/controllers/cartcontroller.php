<?php
require __DIR__ . '/../services/articleservice.php';

class cartController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        //Makes the array suitible for the qeury by imploding it
        $selection = implode(',', $_SESSION['cart']);
        if(!empty($selection)){
            $model = $this->articleService->selectaricles($selection);
        }
        require __DIR__ . '/../views/cart/index.php';
    }
    public function emptycart(){
        //unset the variables when the user wants to empty the cart
        $_SESSION['cart'] =array();
        $_SESSION['orders']=array();
	    header('Location: /cart');
    }
}