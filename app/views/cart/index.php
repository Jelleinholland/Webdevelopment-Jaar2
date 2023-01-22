<?php
include __DIR__ . '/../header.php';
//echo "<h1>Cart!</h1>";

include __DIR__ . '/../footer.php';

//$model = $this->articleService->getAll();

//var_dump($_SESSION['cart']);


//var_dump($model);
//var_dump($_SESSION['cart']);
?>
<section class="text-center bg-light">
<h1 class="fw-light">Artikel pagina!</h1>
<h2 class="fw-light">Op deze pagina kan je de winkelmand inzien en de artikelen bestellen!</h2>
</section>
<div class="cart-button-container">

<?php
//var_dump($_SESSION['orders']);
if(isset($_SESSION['cart'])){
?>
<button type="button" id="empty-cart" class="cart-page-button"><a class="a-link" href="/cart/emptycart"> Winkelmandje leegmaken</a></button>
<?php
}

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
 echo "<p class='cartContent'>$article->content<p>";
 echo "</div>";

    if(!isset($_SESSION["orders"])){
    $_SESSION["orders"]=array();
    }
    if (!in_array($article->id, $_SESSION['orders'])){
        array_push($_SESSION['orders'], $article->id);
    }
    
} 
// foreach($_SESSION['orders'] as $id)
// {
//     echo $id;
// }
// if(!isset($_SESSION['orderselection'])){
//     $_SESSION['orderselection'] = implode(',', $_SESSION['orders']);
// } 
// else{
//     $_SESSION['orderselection'] .= implode(',', $_SESSION['orders']);
// }

// var_dump($_SESSION['orderselection']);


//$_SESSION['articleID'] = $article->id;
//array_push($_SESSION['orders'], $article->id);


//var_dump($_SESSION['orders']);
if(isset($_SESSION['username'])){
?>
<button onclick="location.href='/order/insertProduct'" type="button" class="cart-page-button">Bestellen</button>
<?php
}