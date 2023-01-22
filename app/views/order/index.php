<?php
include __DIR__ . '/../header.php';
echo "<h1>Orders!</h1>";
echo "<h2>On kan je de eerder bestelde artikelen vinden!</h2>";
include __DIR__ . '/../footer.php';

//require __DIR__ . '/../services/articleservice.php';

// private $articleService;
//     //private $bestellingService;

//     function __construct()
//     {
//         $this->articleService = new ArticleService();
//         //$this->bestellingService = new BestellingService();
//     }
//$decoded_orders = json_decode($model);
//$strippedmodel = preg_replace("/[^a-zA-Z 0-9]+/", "", $model );
//var_dump($model);
//var_dump($_SESSION['ordered-articles']);
//var_dump($orderselection);
// var_dump($orderselection);
// foreach ($orderselection as $order) {
//    echo "<div class='cartcontainer'>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    //     echo "<br>";
//    echo "Artikel die aangeschafd is";
//    echo $order->Order_ID;
//    echo $order->User_ID;
//    echo $order->Products;
//    echo $order->Price;
// }
foreach ($model as $article) {
    echo "<div class='cartcontainer'>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<h2 class='cartTitle'>$article->title</h2>";
    echo "<p class='cartDate'><i>$article->posted_at</i><p>";
    echo "<p class='cartDate'><i>$article->id</i><p>";
    echo "<p class='cartContent'>$article->content<p>";
    echo "</div>";
   } 