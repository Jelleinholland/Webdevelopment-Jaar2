<?php
require __DIR__ . '/../services/orderservice.php';

class OrderController
{
    private $orderservice;

    function __construct()
    {
        $this->orderservice = new OrderService();
    }

    public function index()
    {
            $fixedorders = array();
            $orders = array();    
            $orderselection = $this->orderservice->GetOrders($_SESSION['idUser'][0]);
            foreach ($orderselection as $order) {
                array_push($orders, $order->Products);
                $orders = preg_replace("/[^a-zA-Z 0-9]+/", "", $orders);

                foreach($orders as $order){
                    if(mb_strlen($order) > 3){
                        $neworder = str_split($order, 2);
                        foreach($neworder as $p){
                            array_push($fixedorders, $p);
                        }
                    }
                    else if(mb_strlen($order) > 2 and mb_strlen($order) < 3){
                        $neworder = str_split($order, 1);
                        foreach($neworder as $p){
                            array_push($fixedorders, $p);
                        }
                    }
                    else{
                        array_push($fixedorders, $order);
                    }
                }
                            
                $selection = implode(',', $fixedorders);
                $model = $this->orderservice->SelectArticle($selection);
             
            }
            echo $selection;
            // foreach($orders as $order){
            //     //count_chars($order)                                                                    
            //     if(mb_strlen($order) > 3){
            //         $neworder = str_split($order, 2);
            //         foreach($neworder as $p){
            //             array_push($fixedorders, $p);
            //         }
            //     }
            //     else{
            //         array_push($fixedorders, $order);
            //     }
            // }
            // foreach($fixedorders as $fixorder){
            //     echo $fixorder;
            //     echo "-";
            // }
          
        require __DIR__ . '/../views/order/index.php';
    }
    

    public function insertProduct(){
        $orders = implode(',', $_SESSION['orders']);
        //str_replace('"', " ", $orders);
        $this->orderservice->InsertOrder($orders, $_SESSION['idUser'][0], '100');   
        $_SESSION['cart'] =array();
        $_SESSION['orders']=array();
        header("Location: /order");
    }
    // public function SelectArticle(){
    //     $selection = "7,10" ;
    //     $model = $this->orderservice->SelectArticle($selection);
    //     //$_SESSION['ordered-articles'] = array();
    //     //var_dump($articles);
    //     // foreach($articles as $article){
    //     //     echo $article->title;
    //     //     //array_push($_SESSION['ordered-articles'], $article->title);
    //     // }
    //     //var_dump($articles);
    // }
}