<?php
require __DIR__ . '/../services/orderservice.php';

class OrderController
{
    private $orderservice;
    //initialize the services
    function __construct()
    {
        $this->orderservice = new OrderService();
    }

    public function index()
    {       //declare the variables
            $fixedorders = array();
            $orders = array(); 
            //select the orders from the database of the currently loggedin user   
            $orderselection = $this->orderservice->GetOrders($_SESSION['idUser'][0]);
            foreach ($orderselection as $order) {
                array_push($orders, $order->Products);
                //Replace all characters that aren't numbers or letters
                $orders = preg_replace("/[^a-zA-Z 0-9]+/", "", $orders);
                //loop trought the array of orders
                foreach($orders as $order){
                    //checks if the order consits of 1 or more orders 
                    if(mb_strlen($order) > 3){
                        //if the order consits of more then 1 order it wil split the string in preperation for the query
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
                //with the correct orders in the correct format the orders are picked up from the database
                $model = $this->orderservice->SelectArticle($selection);
             
            }
        require __DIR__ . '/../views/order/index.php';
    }
    
    public function insertProduct(){
        //Gives orders the right format for the qeury
        $orders = implode(',', $_SESSION['orders']);
        $this->orderservice->InsertOrder($orders, $_SESSION['idUser'][0], '100');   
        //empty the variables
        $_SESSION['cart'] =array();
        $_SESSION['orders']=array();
        header("Location: /order");
    }
}