<?php
include __DIR__ . '/../header.php';
echo "<h1>LoginPage</h1>";
include __DIR__ . '/../footer.php';
?>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
	<form action="/login/login" method="post">
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<div class="mb-3">
			<label for="Username" class="form-label">GebruikersNaam</label>
			<input type="text" class="form-control" name="Username" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">Uw gegevens zullen nooit gedeeld worden met Derden.</div>
		</div>
			<div class="mb-3">
				<label for="Password" class="form-label">Wachtwoord</label>
				<input type="password" class="form-control" name="Password">
			</div>
		<button name="login" type="submit" class="btn btn-primary">Login</button>
	</form>
</body>
</html>
