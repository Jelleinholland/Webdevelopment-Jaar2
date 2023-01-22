<?php
require __DIR__ . '/../services/articleservice.php';

class cartController
{
    private $articleService;
    //private $bestellingService;

    function __construct()
    {
        $this->articleService = new ArticleService();
        //$this->bestellingService = new BestellingService();
    }

    public function index()
    {
        $selection = implode(',', $_SESSION['cart']);
        if(!empty($selection)){
            $model = $this->articleService->selectaricles($selection);
        }
        require __DIR__ . '/../views/cart/index.php';
    }
    public function emptycart(){
        $_SESSION['cart'] =array();
        $_SESSION['orders']=array();
        
	    header('Location: /cart');
    }
    public function orderProduct(){
        var_dump($_SESSION['orders'][0]);
        //$orderselection = implode(',', $_SESSION['orders']);
       // if(!empty($orderselection)){
        //    $model = $this->articleService->selectaricles($orderselection);
        //}
    }
}