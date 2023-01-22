<?php
include __DIR__ . '/../header.php';
echo "<h1>articles admin page!</h1>";
include __DIR__ . '/../footer.php';
?>
<div id="articlecontainer"></div>
<?php
if(isset($_SESSION['isloggedin']))
{
?>
<script>
        function Fetcharticles(){
            
            fetch('http://localhost/api/article')
            .then(result => result.json())
            .then(articles => {
                //console.log('test');
                articles.forEach(article => {
                    
                    const container = document.createElement('div');
                    //container.classname = "article-element";
                    container.classList.add("slider-element");
                    const header = document.createElement('h2');
                    const articleAuthor = document.createElement('p');
                    const posted_at_container = document.createElement('p');
                    const posted_at = document.createElement('i');
                    const paragraph = document.createElement('p');
                    const editButton = document.createElement('button')
                    const deleteButton = document.createElement('button')
                    
                    editButton.classList.add("edit-button");
                    deleteButton.classList.add("delete-button");
                    editButton.innerText = "Edit article";
                    deleteButton.innerText = "Delete article";

                    let articleTitle = article.title;

                    deleteButton.onclick = function () { location.href = "/article/articleDelete?id=" + article.id};
                    editButton.onclick = function () { location.href = "/article/getOne?id=" + article.id};
                    

                    articleAuthor.innerHTML = article.author;
                    header.innerHTML = article.title;
                    posted_at.innerHTML = article.posted_at;    
                    paragraph.innerHTML = article.content;
                    posted_at_container.appendChild(posted_at);

                    container.appendChild(header);
                    container.appendChild(posted_at_container);
                    container.appendChild(articleAuthor);
                    container.appendChild(paragraph);
                    container.appendChild(editButton);
                    container.appendChild(deleteButton);
        
                    
                    document.getElementById('articlecontainer').appendChild(container);
                    
                });
                console.log(articles)
            })
            .catch(error => console.log(error));
        }
        Fetcharticles();
    </script>
<?php
}
?>