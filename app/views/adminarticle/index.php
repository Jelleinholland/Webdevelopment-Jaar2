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
            //getting the articles by using the api
            fetch('http://localhost/api/article')
            .then(result => result.json())
            .then(articles => {
                articles.forEach(article => {
                    
                    //creating the html elements
                    const container = document.createElement('div');
                    container.classList.add("slider-element");
                    const header = document.createElement('h2');
                    const articleAuthor = document.createElement('p');
                    const posted_at_container = document.createElement('p');
                    const posted_at = document.createElement('i');
                    const paragraph = document.createElement('p');
                    const editButton = document.createElement('button')
                    const deleteButton = document.createElement('button')
                    //add classes to the elements
                    editButton.classList.add("edit-button");
                    deleteButton.classList.add("delete-button");
                    editButton.innerText = "Edit article";
                    deleteButton.innerText = "Delete article";
                    //declare varbale
                    let articleTitle = article.title;
                    //giving the butttons a action
                    deleteButton.onclick = function () { location.href = "/article/articleDelete?id=" + article.id};
                    editButton.onclick = function () { location.href = "/article/getOne?id=" + article.id};
                    
                    //giving the elements values
                    articleAuthor.innerHTML = article.author;
                    header.innerHTML = article.title;
                    posted_at.innerHTML = article.posted_at;    
                    paragraph.innerHTML = article.content;
                    posted_at_container.appendChild(posted_at);
                    //add the elements to the main conatiner
                    container.appendChild(header);
                    container.appendChild(posted_at_container);
                    container.appendChild(articleAuthor);
                    container.appendChild(paragraph);
                    container.appendChild(editButton);
                    container.appendChild(deleteButton);
        
                    
                    document.getElementById('articlecontainer').appendChild(container);
                    
                });
            })
            .catch(error => console.log(error));
        }
        Fetcharticles();
    </script>
<?php
}
?>