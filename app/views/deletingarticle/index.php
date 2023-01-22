<?php
include __DIR__ . '/../header.php';
echo "<h1>Deleting articles page!</h1>";
include __DIR__ . '/../footer.php';
$submit_id = $_GET['id'];

?>
<body>
<form method="post" action="/article/articleDelete" >
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value=<?php echo $submit_id?>>
		
		<div class="input-group">
			<button class="btn" type="submit" name="Btnadd" ></button>
		</div>
		
	</form>
</body>
</html>