<?php
include __DIR__ . '/../header.php';
echo "<h1>Updating articles page!</h1>";
include __DIR__ . '/../footer.php';
//looping trough the article and giving the variables value
foreach($model as $article){
	$session_Id = $article->id;
	$title = $article->title;
	$author = $article->author;
	$content = $article->content;
}
//declaring a session variable for updating of the article in the database
$_SESSION['updatingid'] = $session_Id;
?>
<body>
<form method="post" action="/article/articleUpdate?">
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $title ?>">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="author" value="<?php echo $author ?>">
		</div>
		<div class="input-group">
			<label>Content</label>
			<input type="text" name="content" value="<?php echo $content ?>">
		</div>
		
		<div class="input-group">
			<button class="btn" type="submit" name="Btnadd" >Update</button>
		</div>
		
	</form>
</body>
</html>