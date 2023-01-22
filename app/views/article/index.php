<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../footer.php';
?>
<section class="text-center bg-light">
<h1 class="fw-light">Artikel pagina!</h1>
<h2 class="fw-light">Op deze pagina kan je de artikelen inzien en ze kopen!</h2>
</section>
<button onclick="window.location.href='/cart'" class="Cart-button">Cart</button>
<br>
<br>
<div id="articlecontainer"></div>
<script>
        function Fetcharticles(){
            
            fetch('http://localhost/api/article')
            .then(result => result.json())
            .then(articles => {
                //console.log('test');
                articles.forEach(article => {
                    
                    const container = document.createElement('div');
                    const header = document.createElement('h2');
                    const posted_at_container = document.createElement('p');
                    const posted_at = document.createElement('i');
                    const paragraph = document.createElement('p');
                    const buyButton = document.createElement('button');

                    container.classList.add("slider-element");
                    header.innerHTML = article.title;
                    posted_at.innerHTML = article.posted_at;
                    paragraph.innerHTML = article.content;
                    posted_at_container.appendChild(posted_at);
                    header.classList.add("article-title");
                    buyButton.classList.add("buy-button");
                    buyButton.innerText = "Buy article";
                    container.classList.add("card")
                    
                    buyButton.onclick = function () { location.href = "/article/addToCart?id=" + article.id};
                    
                    container.appendChild(header);
                    container.appendChild(posted_at_container);
                    container.appendChild(paragraph);
                    container.appendChild(buyButton);

                    document.getElementById('articlecontainer').appendChild(container);
                    
                });
                console.log(articles)
            })
            .catch(error => console.log(error));
        }
        Fetcharticles();
    </script>
    </body>
</html>
