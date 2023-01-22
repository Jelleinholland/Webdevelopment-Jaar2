<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../footer.php';
?>
<section class="text-center bg-light">
<h1 class="fw-light">Winkelmandje pagina!</h1>
<h2 class="fw-light">Op deze pagina kan je de winkelmand inzien en de artikelen bestellen!</h2>
<?
if(!isset($_SESSION['username']))
{
?>
<h2 class="fw-light">Om te kunnen bestellen moet je inloggen!</h2>
<?php
}
?>
</section>
<div class="cart-button-container">
<?php
//if the cart is not set the user cannot empty the cart
if(isset($_SESSION['cart'])){
?>
<button type="button" id="empty-cart" class="cart-page-button"><a class="a-link" href="/cart/emptycart"> Winkelmandje leegmaken</a></button>
<?php
}
//display the articles in the cart in the correct format and style
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

    //check if variable is initialized
    if(!isset($_SESSION["orders"])){
    $_SESSION["orders"]=array();
    }
    //if the id is not yet in the array it wil add it to the array
    if (!in_array($article->id, $_SESSION['orders'])){
        array_push($_SESSION['orders'], $article->id);
    }
    
} 
//if the user is not loggedin the user cannot order
if(isset($_SESSION['username'])){
?>
<button onclick="location.href='/order/insertProduct'" type="button" class="cart-page-button">Bestellen</button>
<?php
}