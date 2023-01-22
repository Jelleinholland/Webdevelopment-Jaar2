<?php
class Order 
{
    public int $orderid;
    public int $userid;
    public string $products;
    public int $price;

    // public function __construct(string $products){
    //     //$this->orderid = $orderid;
    //     //$this->userid = $userid;
    //     $this->products = $products;
    //    // $this->price = $price;
    // }

    /**
     * Get the value of products
     */ 
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the value of products
     *
     * @return  self
     */ 
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }


}

