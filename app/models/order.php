<?php
class Order 
{
    public int $orderid;
    public int $userid;
    public string $products;
    public int $price;

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

