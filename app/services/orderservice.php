<?php
require __DIR__ . '/../repositories/orderrepository.php';

class OrderService {
    
    public function InsertOrder($selection, $User_ID, $price) {
        //$encoded_selection = serialize
        $json_orderdata = json_encode($selection);
        //$serializes_orderdata = serialize($selection);
        $repository = new Orderrepository();
        return $repository->InsertOrder($json_orderdata, $User_ID, $price);
    }
    public function GetOrders($id){
        $repository = new Orderrepository();
        return $repository->GetOrders($id);
    }
    public function SelectArticle($selection){
        $repository = new Orderrepository();
        return $repository->SelectArticle($selection);
    }
}