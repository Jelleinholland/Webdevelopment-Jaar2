<?php
include __DIR__ . '/../header.php';
echo "<h1>Orders!</h1>";
echo "<h2>On kan je de eerder bestelde artikelen vinden!</h2>";
include __DIR__ . '/../footer.php';
//display the orders in the correct format and styling
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