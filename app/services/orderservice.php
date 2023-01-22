<?php
require __DIR__ . '/../repositories/orderrepository.php';

class OrderService {
    //inserting a order in the database
    public function InsertOrder($selection, $User_ID, $price) {
        //encode the array for storing it in the databse
        $json_orderdata = json_encode($selection);
        $repository = new Orderrepository();
        return $repository->InsertOrder($json_orderdata, $User_ID, $price);
    }
    //get orders from the database of the currenlty loggedin user
    public function GetOrders($id){
        $repository = new Orderrepository();
        return $repository->GetOrders($id);
    }
    //select the articles from the orders
    public function SelectArticle($selection){
        $repository = new Orderrepository();
        return $repository->SelectArticle($selection);
    }
}