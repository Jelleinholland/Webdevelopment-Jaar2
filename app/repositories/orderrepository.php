<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/article.php';
require __DIR__ . '/../models/order.php';

class OrderRepository extends Repository{

    public function insertOrder($Selection, $UserID, $Price){
        try {
            $sqlquery = "INSERT INTO Bestelling (User_ID, Products, Price) VALUES (:User_ID, :Products, :Price)";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':User_ID', $UserID );
            $stmt->bindParam(':Products', $Selection);
            $stmt->bindParam(':Price', $Price);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function Getorders($id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Bestelling WHERE User_ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $order = $stmt->fetchAll();

            return $order;
            

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    public function SelectArticle($selection){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM article WHERE id IN ({$selection})");
            //$stmt->bindParam(':selection', $selection);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $article = $stmt->fetchAll();

            return $article;
            

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}